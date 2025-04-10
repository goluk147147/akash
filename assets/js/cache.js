async function getShortsData(key='0', limit=100) {
  key = 'shortsData-'+key;
  var shorts = [];
  await fetchCacheData(key)
    .then(async (cache_data) => {
      if (cache_data.data) {
        let time = Date.now();
        if (time > cache_data.cacheExpiration) {
          removeCacheData(key, 'all');
          shorts = await fetchShorts(key, limit);
        }else{
          shorts = cache_data;
          if(cache_data.totalCount < limit){
            shorts = await fetchShorts(key, limit, cache_data);
          }
        }
      }else{
        shorts = await fetchShorts(key, limit);
      }
    })
    .catch(async (err)=>{
      shorts = await fetchShorts(key, limit);
    });
    if(shorts.data){
      shorts.data = shuffleArray(shorts.data);
    }
    return shorts;
}

function shuffleArray(array, chunkSize=10) {
  function shuffleChunk(chunk) {
    for (let i = chunk.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [chunk[i], chunk[j]] = [chunk[j], chunk[i]];
    }
    return chunk;
  }
  
  for (let i = 0; i < array.length; i += chunkSize) {
    const chunk = array.slice(i, i + chunkSize);
    const shuffledChunk = shuffleChunk(chunk);
    array.splice(i, chunkSize, ...shuffledChunk);
  }

  return array;
}


async function fetchShorts(key, limit=100, cache_data=null){
  let timestamp = cache_data?.last_updated || '0000000000';
  var limit = (cache_data?.totalData-limit) || limit;
  var feedType = localStorage.getItem('feedType')??'0';
  let page = (Math.ceil(cache_data?.totalCount/cache_data?.itemsPerPage)+1) || 1;
  try {
    const response = await $.ajax({
      url: `${base_url}web/home/getShorts`,
      type: "post",
      data: { page, limit, feedType}
    });
    const res = JSON.parse(response);
    if (cache_data && cache_data.data) {
      if(res.status){
        await shortDataCacheUpdate(cache_data, res.data);
        var cachedData = {
          data: cache_data.data,
          totalCount: (cache_data.totalCount+res.totalCount),
          itemsPerPage: res.itemsPerPage,
          stillDataRemains: res.stillDataRemains,
          cacheExpiration: 0
        };        
        await putShortsCache(cachedData, key);
      }else{
        var cachedData = cache_data;
        cachedData.stillDataRemains = false;
        await putShortsCache(cachedData, key);
      }
      return cachedData;
    } else if(res.status){
      var cachedData = {
        data: res.data,
        totalCount: res.totalCount,
        itemsPerPage: res.itemsPerPage,
        stillDataRemains: res.stillDataRemains,
        cacheExpiration: 0
      };
      await putShortsCache(cachedData, key);
      return cachedData;
    }else{
      return [];
    }

  } catch (error) {
    console.warn('Error fetching watching details:', error);
  }
  return "";
}

async function putShortsCache(data, key, cacheTime = (2*60*60*1000)) {
  try {
    const cache = await caches.open('appCache');
    var cacheExpirationTime = Date.now() + cacheTime;
    data.cacheExpiration = cacheExpirationTime;
    await cache.put(key, new Response(JSON.stringify(data)));
  } catch (error) {
    console.warn('Error updating cache:', error);
  }
}

async function shortDataCacheUpdate(cache_data, newData) {
  if (!newData) return;

  let new_key = Object.keys(cache_data.data).length;
  newData.forEach(items => {
      cache_data.data[new_key] = items;
      new_key += 1;
  });
}

async function manageContWatchlist(key) {
  fetchCacheData(key)
    .then(async (cache_data) => {
      if (cache_data.data) {
        let time = Date.now();
        if (time > cache_data.cacheExpiration) {
          await removeCacheData(key, 'all');
          cache_data = null;
        }
      }
      await fetchWatchingDetailsAndUpdateCache(null, cache_data);
    });
}


async function manageWatchlist(key) {
  fetchCacheData(key)
    .then((cache_data) => {
      if (cache_data.data) {
        let time = Date.now();
        if (time > cache_data.cacheExpiration) {
          removeCacheData(key, 'all');
          cache_data = null;
        }
      }
      fetchWatchListAndUpdateCache(null, cache_data);
    });
}

async function manageRatings(key) {
  fetchCacheData(key)
    .then((cache_data) => {
      if (cache_data.data) {
        let time = Date.now();
        if (time > cache_data.cacheExpiration) {
          removeCacheData(key, 'all');
          cache_data = null;
        }
      }
      fetchRatingListAndUpdateCache(null, cache_data);
    });
}

async function manageFavourites(key, type = 2) {
  fetchCacheData(key)
    .then((cache_data) => {
      if (cache_data.data) {
        let time = Date.now();
        if (time > cache_data.cacheExpiration) {
          removeCacheData(key, 'all');
          cache_data = null;
        }
      }
      fetchFavouritesAndUpdateCache(null, cache_data, type);
    });
}

async function pullCache(id, data = null) {
  if (id) {
    var contWatchKey = id + '-continueWatching';
    var watchKey = id + '-watchList';
    var ratingKey = id + '-ratings';
    var favKey0 = id + '-0favourites';
    var favKey1 = id + '-1favourites';
    await Promise.all([
      manageContWatchlist(contWatchKey),
      manageWatchlist(watchKey),
      manageRatings(ratingKey),
      manageFavourites(favKey0, 2),
      manageFavourites(favKey1, 1)
    ])
      .then((results) => {
        if (data != null && data.url) {
          window.location.href = data.url;
        }
      })
      .catch((error) => {
        if (data != null && data.url) {
          window.location.href = data.url;
        }
        console.warn("Error:", error);
      });
  }
}

async function fetchWatchingDetailsAndUpdateCache(redirectToUrl, cache_data = null) {
  const timestamp = cache_data?.last_updated || '0000000000';

  try {
    const response = await $.ajax({
      url: `${base_url}web/login_register/get_watching_details`,
      type: "post",
      data: { timestamp }
    });

    const res = JSON.parse(response);
    const last_updated = res.last_updated > 0 ? res.last_updated : cache_data?.last_updated;
    if (cache_data.data) {
      await handleCacheDataUpdate(cache_data, res.data);
      watchingData = cache_data.data;
      await put_cache(cache_data.data, res.key, redirectToUrl, last_updated);
    } else {
      watchingData=res.data;
      await put_cache(res.data, res.key, redirectToUrl, last_updated);
    }

  } catch (error) {
    console.warn('Error fetching watching details:', error);
  }
}

async function handleCacheDataUpdate(cache_data, newData) {
  if (!newData) return;

  let new_key = Object.keys(cache_data.data).length;
  console.log(cache_data,'last_updated');

  newData.forEach(item => {
    const exists = cache_data.data.some(c_item => Number(item.video_id) == Number(c_item.video_id));
    if (!exists) {
      cache_data.data[new_key] = {
        "id": item.id,
        "is_deleted": 0,
        "is_synced": 1,
        "paused_at": item.paused_at,
        "poster_url": item.poster_url,
        "show_id": item.show_id,
        "last_updated": item.last_updated,
        "title": item.title,
        "video_duration": item.video_duration,
        "video_id": item.video_id,
        "encrypted_id": item.encrypted_id,
        "updated_at": item.updated_at ?? Date.now()
      };
      new_key += 1;
    }
  });
}


async function fetchWatchListAndUpdateCache(redirectToUrl, cache_data = null) {
  const timestamp = cache_data?.last_updated || '0000000000';

  try {
    const response = await $.ajax({
      url: `${base_url}web/login_register/get_watchlist`,
      type: "post",
      data: { timestamp },
    });

    const res = JSON.parse(response);
    const last_updated = res.last_updated > 0 ? res.last_updated : cache_data?.last_updated;

    if (cache_data?.data) {
      updateCacheData(cache_data, res.data);
      await put_cache(cache_data.data, res.key, redirectToUrl, last_updated);
    } else {
      await put_cache(res.data, res.key, redirectToUrl, last_updated);
    }

  } catch (error) {
    console.warn('Error fetching watchlist:', error);
  }
}

function updateCacheData(cache_data, newData) {
  if (!newData) return;

  let new_key = Object.keys(cache_data.data).length;

  newData.forEach(item => {
    const exists = cache_data.data.some(c_item => Number(item.video_id) == Number(c_item.video_id));
    if (!exists) {
      cache_data.data[new_key] = {
        "id": item.id,
        "show_id": item.show_id,
        "enc_show_id": item.enc_show_id,
        "media_type": item.media_type,
        "title": item.title,
        "poster_url": item.poster_url,
        "thumbnail_url": item.thumbnail_url,
        "description": item.description,
        "last_updated": item.last_updated,
        "updated_at": item.updated_at ?? Date.now(),
        "is_deleted": 0,
        "is_synced": 1
      };
      new_key += 1;
    }
  });
}

var homeDataCount = 1;
async function fetchMasterContentAndUpdateCache(redirectToUrl, cache_data = null, update_homecontent = null) {
  const timestamp = '0000000000';
  const cacheTime = 35 * 60 * 1000;
  try {
    if (window.location.href == base_url) {
      shimmer('show');
    }
    const [resp0, resp1] = await Promise.all([fetchMasterContent(timestamp), fetchMasterContent_home(timestamp)]);
    if (resp0 && resp1) {
      var navbar = JSON.parse(resp0);
      var homedata = JSON.parse(resp1);
      var res = { 'home_data': homedata.home_data, 'nav_banner': navbar.nav_banner };
      var parsedRes = res;
      if (!res.status) {
        //window.location.href = base_url+'no-data';
        //return false;
      }
    }
    if (shouldRetryFetch(parsedRes)) {
      homeDataCount += 1;
      fetchMasterContentAndUpdateCache(null, null);
      return;
    }

    let all_lang = navbar.nav_banner.data.languages;
    let static_pages = navbar.nav_banner.data.static_pages;
    let hns = navbar.nav_banner.data.help_support;
    //console.log("navbar_banner",navbar.nav_banner);
    if (navbar.nav_banner.data.hasOwnProperty('subscription')) {
      let subscription_plan_exists = navbar.nav_banner.data.subscription;
      //console.log("subscription_plan_exists2",subscription_plan_exists);
      localStorage.setItem('pb_subs', subscription_plan_exists);
      if(subscription_plan_exists == 0){ 
          $('.suscribe_now_btn').addClass("d-none");
          $('.border_lines_user').addClass("d-none");
          $('#nav-year-tab').addClass("d-none");
          $('.sub_heading_dt').addClass("d-none");
      } else { 
          $('.suscribe_now_btn').removeClass("d-none");
          $('.border_lines_user').removeClass("d-none");
          $('#nav-year-tab').removeClass("d-none");
          $('.sub_heading_dt').removeClass("d-none");
      }
    }

    // await putCache(parsedRes, 'masterContent', null, 0, cacheTime);
    // await putCache(all_lang, 'all_lang', null, 0, cacheTime);
    await Promise.all([
      putCache(parsedRes, 'masterContent-'+(feedType??0), null, 0, cacheTime),
      putCache(all_lang, 'all_lang', null, 0, cacheTime),
      putCache(static_pages, 'static_pages', null, 0, static_pages),
      putCache(hns, 'help_support', null, 0, cacheTime)
    ]);
    if (update_homecontent === null) { 
      await updateHomeContent(0);
    }
    parsedRes = await fetchCacheData('masterContent-'+(feedType??0));

    if (update_homecontent === null) {
      // 1st priority
      navbar_data(parsedRes.data.nav_banner.data.categories, parsedRes.data.nav_banner.data);

      // 2nd priority
      checkBanner();
    }
    // Final Rendering
    if (window.location.href == base_url) {
      await renderContent(parsedRes);
      shimmer('hide');
      initializeCarousel();
    }
  } catch (err) {
    console.warn('Error fetching or processing content:', err);
  }
}

function fetchMasterContent(timestamp) {
  return $.ajax({
    url: `${base_url}web/home/ajax_data`,
    type: "post",
    data: { timestamp }
  });
}

function fetchMasterContent_home(timestamp) {
  var tag = localStorage.getItem('feedType')??'0';
  return $.ajax({
    url: `${base_url}web/home/ajax_data_part`,
    type: "post",
    data: { timestamp, tag }
  });
}

function shouldRetryFetch(response) {
  //return (!response.nav_banner.status || !response.home_data.status) && homeDataCount === 1;
}

async function putCache(data, key, options, expiration, cacheTime) {
  // Assume put_cache is a predefined function
  return await put_cache(data, key, options, expiration, cacheTime);
}

async function renderContent(res) {
  try {
    // console.log( res.data.home_data.data,'renders');return;
    // res.data.home_data.data.forEach(item => {
    //   if (item.playlist_type === 'banner') {
    //     renderBanners(item.list);
    //   }
    // });


    await Promise.all([
      // renderBanners(res.data.nav_banner.data.banners),
      renderTrendingSections(res.data.home_data),
      // renderGenres(res.data.nav_banner.data.genres),
      // renderContentLanguages(res.data.nav_banner.data.content_languages)
    ]);
  } catch (err) {
    shimmer('hide');
    console.error('Error rendering content:', err);
  }
}




async function fetchRatingListAndUpdateCache(redirectToUrl, cache_data = null) {
  const timestamp = cache_data?.last_updated || '0000000000';

  try {
    const response = await $.ajax({
      url: base_url + 'web/login_register/get_ratings',
      type: 'POST',
      data: { timestamp },
    });

    const res = JSON.parse(response);
    const last_updated = res.last_updated > 0 ? res.last_updated : cache_data?.last_updated;

    if (cache_data?.data) {
      const updatedCacheData = syncCacheData(cache_data.data, res.data);
      await put_cache(updatedCacheData, res.key, redirectToUrl, last_updated);
    } else {
      await put_cache(res.data, res.key, redirectToUrl, last_updated);
    }
  } catch (error) {
    console.warn("Failed to fetch and update cache:", error);
  }
}

function syncCacheData(cacheData, responseData) {
  const newCacheData = { ...cacheData };
  const newKeys = Object.keys(newCacheData).length;

  responseData.forEach((item) => {
    const exists = cacheData.some((c_item) => item.video_id === c_item.video_id);
    if (!exists) {
      newCacheData[newKeys] = {
        id: item.id,
        show_id: item.show_id,
        rating: item.rating,
        last_updated: item.last_updated,
        is_deleted: 0,
        is_synced: 1,
      };
      newKeys += 1;
    }
  });

  return newCacheData;
}

async function fetchFavouritesAndUpdateCache(redirectToUrl, cache_data = null, type = 2) {
  const timestamp = cache_data?.last_updated || '0000000000';

  try {
    const response = await $.ajax({
      url: `${base_url}web/login_register/get_favourite_list`,
      type: "post",
      data: { timestamp, type }
    });

    const res = JSON.parse(response);
    const last_updated = res.last_updated > 0 ? res.last_updated : cache_data?.last_updated;

    if (cache_data?.data) {
      updateFavCacheData(cache_data, res.data);
      await put_cache(cache_data.data, res.key, redirectToUrl, last_updated);
    } else {
      await put_cache(res.data, res.key, redirectToUrl, last_updated);
    }

  } catch (error) {
    console.warn('Error fetching favourites:', error);
  }
}

function updateFavCacheData(cache_data, newData) {
  if (!newData) return;

  let new_key = Object.keys(cache_data.data).length;

  newData.forEach(item => {
    const exists = cache_data.data.some(c_item => Number(item.show_id) == Number(c_item.show_id));
    if (!exists) {
      cache_data.data[new_key] = {
        "show_id": item.show_id,
        "enc_id": item.enc_id,
        "type": item.type,
        "poster_url": item.poster_url,
        "thumbnail": item.thumbnail,
        "still_live": item.still_live,
        "last_updated": item.last_updated,
        "is_deleted": 0,
        "is_synced": 1
      };
      new_key += 1;
    }
  });
}

function fetchDetailContentAndUpdateCache(id, cache_data = null) {
  const cacheTime = 24 * 60 * 60 * 1000;
  shimmer('show');
  
  $.ajax({
    url: base_url + 'web/dashboard/ajax_data_details',
    type: 'post',
    data: { id },
    success: async function (res) {
      try {
        const parsedRes = JSON.parse(res);
        console.log('parsedRes',parsedRes);
        await putDetailCache(parsedRes.data, cache_data);
        title = parsedRes.data.title;
        geners = parsedRes.data.genres;
        showID = parsedRes.data.id;
        is_paid = parsedRes.data.is_paid ?? 0;
        season = parsedRes.data.season;
        poster = parsedRes.data.poster_url;
        thumbnail = parsedRes.data.thumbnail;
        description = parsedRes.data.description;
        media_type = parsedRes.data.season[0].videos[0].media_type??0;
        skipSeason = parsedRes.data.skip_season;

        const renderTasks = [
          renderBanners_data(parsedRes.data),
          renderrelated_data(parsedRes.data)
        ];

        if (skipSeason != 1 && season && season.length > 0) {
          $('#episode_season').addClass('banner-bottom-sec');
          $('#related_details').removeClass('banner-bottom-sec');
          renderTasks.push(episode_dt_data(parsedRes.data));
        } else {
          $('#episode_season').removeClass('banner-bottom-sec');
          $('#related_details').addClass('banner-bottom-sec');
        }
        await Promise.all(renderTasks);
        shimmer('hide');
      } catch (err) {
        window.location.href = base_url + 'no-data';
        console.warn('Error processing data:', err);
        //shimmer('hide');  // Ensure shimmer is hidden in case of error
      }
    },
    error: function (xhr, status, error) {
      console.warn('AJAX request failed:', status, error);
      shimmer('hide');  // Ensure shimmer is hidden in case of error
    }
  });
}


async function putDetailCache(res, cachedData = null) {

  try {
    const cache = await caches.open('appCache');
    var cacheExpiration = Date.now() + 24 * 60 * 60 * 1000;
    res.expirationTime = cacheExpiration;
    var newData = [];
    newData.push(res);
    var key = 0;
    if (cachedData) {
      key = cachedData.data.length;
      cachedData.data.push(res);
      newData = cachedData.data;
    }
    cachedData = {
      data: newData,
      last_updated: 0,
      cacheExpiration: 0
    };
    await cache.put('contentDetail', new Response(JSON.stringify(cachedData)));
  } catch (error) {
    console.warn('Error updating cache:', error);
  }
}


async function manageContentDetail(id) {
  var cacheData = await fetchCacheData('contentDetail');
  var notFound = true;
  var time = Date.now();
  var keyToDelete = -1;
  if (cacheData) {
    console.log('cacheData',cacheData);
    cacheData.data.forEach((item, key) => {
      if (item.id == id) {
        if (time >= item.expirationTime) {
          cacheData.data = deleteAndReindex(cacheData.data, key);
        } else {
          notFound = false;
        }
      }
    });
    if (notFound) {
      fetchDetailContentAndUpdateCache(id, cacheData);
    } else {
      cacheData.data.forEach((item, key) => {
        if (item.id == id) {
          title = item.title;
          geners = item.genres;
          showID = item.id;
          is_paid = item.is_paid ?? 0;
          season = item.season;
          poster = item.poster_url;
          thumbnail = item.thumbnail;
          description = item.description;
          media_type = item.type;
          renderBanners_data(item);
          renderrelated_data(item);
          if ((item.type == 0 && item.skip_season != 1)||(item.type ==1 && item.skip_season == 1)  ) {
            if (item.season.length > 0) {
              $('#episode_season').addClass('banner-bottom-sec');
              $('#related_details').removeClass('banner-bottom-sec');
              episode_dt_data(item);
            } else {
              $('#episode_season').removeClass('banner-bottom-sec');
              $('#related_details').addClass('banner-bottom-sec');
            }
          } else {
            $('#episode_season').removeClass('banner-bottom-sec');
            $('#related_details').addClass('banner-bottom-sec');
          }
        }
      });
      setTimeout(() => { shimmer('hide'); }, 500);
    }
  } else {
    fetchDetailContentAndUpdateCache(id, null);
  }
}


async function put_cache(data, key, redirectToUrl = null, last_updated = null, cacheTime = (30 * 24 * 60 * 60 * 1000)) {
  try {
    const cache = await caches.open('appCache');
    var cacheExpirationTime = Date.now() + cacheTime;
    cachedData = {
      data: data,
      last_updated: last_updated,
      cacheExpiration: cacheExpirationTime
    };
    await cache.put(key, new Response(JSON.stringify(cachedData)));
    if (redirectToUrl != null) {
      window.location.href = redirectToUrl;
    }
  } catch (error) {
    console.warn('Error updating cache:', error);
  }
}


function get_unsynced_data(data) {
  var unsyncedData = Array();
  if (data) {
    data.forEach((item, key) => {
      if (item.is_synced != 1) {
        newobj = item
        newobj.key = key;
        unsyncedData.push(newobj);
      }
    });
  }
  return unsyncedData;
}



async function fetchCacheData(key) {
  try {
    var cache = await caches.open('appCache');
    var cachedResponse = await cache.match(key);
    if (cachedResponse) {
      var cachedData = await cachedResponse.json();
      return cachedData;
    } else {
      return "";
    }
  } catch (err) {
    console.warn('Error fetching cache data:', err);
    return "";
  }
}


async function update_cache(cachekey, show_id, data = null, activity = 1) {
  try {
    var cache = await caches.open('appCache');

    // Retrieve the existing data from the cache
    var cachedResponse = await cache.match(cachekey);
    if (cachedResponse) {

      var cachedData = await cachedResponse.json();
      var objArray = cachedData.data;
      var new_data = true;
      cachedData.data.forEach((value, key) => {
        if (value != null) {
          if (value.video_id != show_id && data && value.show_id == data.show_id) {
            cachedData.data[key].is_deleted = 1;
            cachedData.data[key].is_synced = 0;
          }
          if (value.video_id == show_id) {
            if (activity == 3) {
              if (value.is_synced == 0 && value.last_updated == 0) {
                cachedData.data = deleteAndReindex(cachedData.data, key);
              } else {
                cachedData.data[key].is_deleted = 1;
                cachedData.data[key].is_synced = 0;
              }
            } else {
              cachedData.data[key].paused_at = data.crTime;
              cachedData.data[key].is_deleted = 0;
              cachedData.data[key].is_synced = 0;
              cachedData.data[key].updated_at = Date.now();
              if(data.lastAd && data.lastAd != null){
                cachedData.data[key].lastAd = data.lastAd;
              }
            }
            new_data = false;
          }
        }
      });
      if (new_data && data != null) {
        var new_key = Object.keys(cachedData.data).length;
        var new_cache = {
          "id": "0",
          "show_id": data.show_id,
          "title": data.title,
          "poster_url": data.poster_url,
          "encrypted_id": data.encrypted_id,
          "video_id": video_id,
          "is_synced": 0,
          "last_updated": 0,
          "paused_at": data.crTime,
          "video_duration": data.dur,
          "is_deleted": 0,
          "updated_at": data.updated_at ?? Date.now(),
          "lastAd": data.lastAd??null
        }
        cachedData.data[new_key] = new_cache;
      }
      await cache.put(cachekey, new Response(JSON.stringify(cachedData)));
    } else {
      var cachedata = [];
      var new_cache = {
        "id": "0",
        "show_id": data.show_id,
        "title": data.title,
        "poster_url": data.poster_url,
        "encrypted_id": data.encrypted_id,
        "video_id": video_id,
        "is_synced": 0,
        "last_updated": 0,
        "paused_at": data.crTime,
        "video_duration": data.dur,
        "updated_at": data.updated_at ?? Date.now(),
        "lastAd": data.lastAd ?? null,
        "is_deleted": 0
      }
      cachedata.push(new_cache);
      put_cache(cachedata, cachekey, null, 0);
    }
  } catch (error) {
    console.warn('Error updating specific data for key:', error);
  }
}

function updateWatchlistCache(cachekey, data = null, activity = 1) {
  return new Promise(async (resolve, reject) => {
    try {
      var cache = await caches.open('appCache');
      var cachedResponse = await cache.match(cachekey);

      if (cachedResponse) {
        var cachedData = await cachedResponse.json();
        var new_data = true;
        cachedData.data.forEach((value, key) => {
          if (value != null && value.show_id == data.show_id) {
            if (activity == 3) {
              if (value.is_synced == 0 && value.last_updated == 0) {
                cachedData.data = deleteAndReindex(cachedData.data, key);
              } else {
                cachedData.data[key].is_deleted = 1;
                cachedData.data[key].is_synced = 0;
                cachedData.data[key].updated_at = Date.now();
              }
            } else {
              cachedData.data[key].is_deleted = 0;
              cachedData.data[key].is_synced = 0;
              cachedData.data[key].updated_at = Date.now();
            }
            new_data = false;
          }
        });
        if (new_data && data != null && activity == 1) {
          var new_key = Object.keys(cachedData.data).length;
          var new_cache = {
            "id": "0",
            "show_id": data.show_id,
            "enc_show_id": data.enc_show_id,
            "title": data.title,
            "genres": data.genres,
            "is_paid": data.is_paid,
            "poster_url": data.poster_url,
            "thumbnail_url": data.thumbnail,
            "description": data.description,
            "media_type": data.media_type,
            "is_synced": 0,
            "last_updated": 0,
            "is_deleted": 0,
            "updated_at": data.updated_at ?? Date.now()
          }
          cachedData.data[new_key] = new_cache;
        }
        await cache.put(cachekey, new Response(JSON.stringify(cachedData)));
        resolve(cachedData);
      } else if (activity == 1) {
        var new_cache = [{
          "id": "0",
          "show_id": data.show_id,
          "enc_show_id": data.enc_show_id,
          "title": data.title,
          "genres": data.genres,
          "is_paid": data.is_paid,
          "poster_url": data.poster_url,
          "thumbnail_url": data.thumbnail,
          "description": data.description,
          "media_type": data.media_type,
          "is_synced": 0,
          "last_updated": 0,
          "is_deleted": 0,
          "updated_at": data.updated_at ?? Date.now()
        }];
        await put_cache(new_cache, cachekey, null, 0);
        resolve(new_cache);
      }
    } catch (error) {
      console.warn('Error updating specific data for key:', error);
      reject(error);
    }
  });
}

async function updateRatingCache(cachekey, data = null, activity = 1) {
  try {
    var cache = await caches.open('appCache');

    // Retrieve the existing data from the cache
    var cachedResponse = await cache.match(cachekey);
    if (cachedResponse) {

      var cachedData = await cachedResponse.json();
      var objArray = cachedData.data;
      var new_data = true;
      cachedData.data.forEach((value, key) => {
        if (value != null) {
          if ((value.show_id == data.show_id)) {
            if (activity == 3) {
              cachedData.data[key].rating = '';
              if (value.is_synced == 0 && value.last_updated == 0) {
                cachedData.data = deleteAndReindex(cachedData.data, key);
              } else {
                cachedData.data[key].is_deleted = 1;
                cachedData.data[key].is_synced = 0;
              }
            } else {
              cachedData.data[key].rating = data.rating;
              cachedData.data[key].is_deleted = 0;
              cachedData.data[key].is_synced = 0;
            }
            new_data = false;
          }
        }
      });
      if (new_data && data != null) {
        var new_key = Object.keys(cachedData.data).length;
        var new_cache = {
          "id": "0",
          "show_id": data.show_id,
          "rating": data.rating,
          "is_synced": 0,
          "last_updated": 0,
          "is_deleted": 0
        }
        cachedData.data[new_key] = new_cache;
      }
      await cache.put(cachekey, new Response(JSON.stringify(cachedData)));
    } else {
      var cachedata = [];
      var new_cache = {
        "id": "0",
        "show_id": data.show_id,
        "rating": data.rating,
        "is_synced": 0,
        "last_updated": 0,
        "is_deleted": 0
      }
      cachedata.push(new_cache);
      put_cache(cachedata, cachekey, null, 0);
    }
  } catch (error) {
    console.warn('Error updating specific data for key:', error);
  }
}


async function updateFavouriteCache(cachekey, data = null, activity = 1) {
  try {
    var cache = await caches.open('appCache');

    // Retrieve the existing data from the cache
    var cachedResponse = await cache.match(cachekey);
    if (cachedResponse) {

      var cachedData = await cachedResponse.json();
      var objArray = cachedData.data;
      var new_data = true;
      cachedData.data.forEach((value, key) => {
        if (value != null) {
          if ((value.show_id == data.show_id)) {
            if (activity == 3) {
              if (value.is_synced == 0 && value.last_updated == 0) {
                cachedData.data = deleteAndReindex(cachedData.data, key);
              } else {
                cachedData.data[key].is_deleted = 1;
                cachedData.data[key].is_synced = 0;
              }
            } else {
              cachedData.data[key].is_deleted = 0;
              cachedData.data[key].is_synced = 0;
            }
            new_data = false;
          }
        }
      });
      if (new_data && data != null) {
        var new_key = Object.keys(cachedData.data).length;
        var new_cache = {
          "show_id": data.show_id,
          "id": data.channel_id,
          "channel_id": data.channel_id,
          "enc_id": data.enc_id,
          "thumbnail": data.thumbnail,
          "poster_url": data.poster_url,
          "still_live": data.still_live,
          "show_id": data.show_id,
          "type": data.type,
          "is_synced": 0,
          "last_updated": 0,
          "is_deleted": 0
        }
        cachedData.data[new_key] = new_cache;
      }
      await cache.put(cachekey, new Response(JSON.stringify(cachedData)));
    } else {
      var cachedata = [];
      var new_cache = {
        "show_id": data.show_id,
        "id": data.channel_id,
        "channel_id": data.channel_id,
        "enc_id": data.enc_id,
        "thumbnail": data.thumbnail,
        "poster_url": data.poster_url,
        "still_live": data.still_live,
        "show_id": data.show_id,
        "type": data.type,
        "is_synced": 0,
        "last_updated": 0,
        "is_deleted": 0
      }
      cachedata.push(new_cache);
      put_cache(cachedata, cachekey, null, 0);
    }
  } catch (error) {
    console.warn('Error updating specific data for key:', error);
  }
}


async function update_bulk_cache(key, unsyncedData, last_updated) {
  var cache = await caches.open('appCache');
  var cachedResponse = await cache.match(key);
  if (cachedResponse) {
    var cachedData = await cachedResponse.json();
    if (cachedData) {
      unsyncedData.forEach((value, key) => {
        if (value) {
          if (cachedData.data[value.key].is_deleted != 1 && cachedData.data[value.key].is_synced == 0) {
            cachedData.data[value.key].is_synced = 1;
            cachedData.data[value.key].last_updated = last_updated;
          }
        }
      });
      unsyncedData.forEach((value, key) => {
        if (value) {
          if (value.is_deleted == 1) {
            cachedData.data = deleteAndReindex(cachedData.data, value.key);
          }
        }
      });
      await cache.put(key, new Response(JSON.stringify(cachedData)));
    }
  }
}


async function removeCacheData(profilekey, video_id, callback = null) {
  try {
    var cache = await caches.open('appCache');
    var cachedResponse = await cache.match(profilekey);
    if (cachedResponse) {
      var cachedData = await cachedResponse.json();
      if (video_id != 'all') {
        cachedData.data.forEach((value, key) => {
          if (value != null) {
            if (value.video_id == video_id) {
              cachedData.data[key].is_deleted = 1;
              cachedData.data[key].updated_at = Date.now();
            }
          }
        });

        await cache.put(profilekey, new Response(JSON.stringify(cachedData)));
        if (callback != null) {
          callback(cachedData.data);
        }

      } else {
        await cache.delete(profilekey);
      }
    }
  } catch (err) {
    console.warn('Error :', err);
  }
}


function deleteAndReindex(obj, keyToDelete) {
  let newObj = [];
  obj.forEach((item, key) => {
    if (key != keyToDelete) {
      newObj.push(item);
    }
  });
  return newObj;
} 