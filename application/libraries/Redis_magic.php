<?php

/* * *
 *      _____            _  _
 *     |  __ \          | |(_)
 *     | |__) | ___   __| | _  ___
 *     |  _  / / _ \ / _` || |/ __|
 *     | | \ \|  __/| (_| || |\__ \
 *     |_|  \_\\___| \__,_||_||___/
 *
 *    A libarary having normal functions of php and redis
 *    While written I used redis 4.* version
 *    fx -: means function in this file
 *    follow link https://www.hugeserver.com/kb/install-redis-centos/ for installation
 *    http://webd.is/ for many things 
 */

Class Redis_magic {

    public $redis = 0;

    public function __construct() { 
        require APPPATH . "third_party/predis/autoload.php";
        Predis\Autoloader::register();

        $redis_config = array(
            "scheme" => "tcp",
            "host" =>  "pb-dev-elasticache.jzcxyi.ng.0001.aps1.cache.amazonaws.com",
            "port" => 6379,
            "password" => ""
        );
        // if (defined("CONFIG_REDIS_PASSWORD") && CONFIG_REDIS_PASSWORD)
        //     $redis_config['password'] = CONFIG_REDIS_PASSWORD;

       // $this->redis = new Predis\Client($redis_config);

        try {
            $this->redis = new Predis\Client($redis_config);
            //$this->redis->connect($config['host'], $config['port']);
            if (!$this->redis->ping()) {
                log_message('error', 'Unable to connect to Redis.');
                throw new Exception('Unable to connect to Redis.');
            }
        } catch (RedisException $e) {
            log_message('error', 'Redis Exception: ' . $e->getMessage());
            $this->redis = null;
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $this->redis = null;
        }

    }

    /* fx to set a value  for respcetive key */

    public function SET($key, $value) {
        return $this->redis->SET($key, $value);
    }

    /* fx to get a value from key */

    public function GET($key) {
        return $this->redis->GET($key);
    }

    /* set key with expiry in seconds */

    public function SETEX($key, $seconds, $value) {
        return $this->redis->SETEX($key, $seconds, $value);
    }

    /* check variables living time */

    public function TTL($key) {
        return $this->redis->TTL($key);
    }

    /* expire variables living time */

    public function EXPIRE($key, $seconds) {
        return $this->redis->EXPIRE($key, $seconds);
    }

    /* Redis sets
     * https://redis.io/commands/hexists
     */
    /* set an array */

    public function HMSET($table, $u_id, $data) {
        $this->redis->HMSET($table . ':' . $u_id, $data);
        $this->redis->SADD($table . ':Ids', $u_id);
    }

    public function HGETALL($table, $index) {
        if ($index && is_array($index)) {
            $pipeline = $this->redis->pipeline();
            foreach ($index as $val) {
                $pipeline->HGETALL($table . ":" . $val);
            }
            return array_combine($index, $pipeline->execute());
        } else if (is_string($index) || is_int($index))
            return $this->redis->HGETALL($table . ':' . $index);
    }

    public function EXPIRE_HMSET_KEY($table, $u_id, $seconds) {
        $this->redis->EXPIRE($table . ':' . $u_id, $seconds);
    }

    /* Publish a message */

    public function PUBLISH($channel_name, $message) {
        return $this->redis->PUBLISH($channel_name, $message);
    }

    /* Publish a message */

    public function LPUSH($list_name, $value) {
        if ($value && is_array($value)) {
            $pipeline = $this->redis->pipeline();
            foreach ($value as $val) {
                $pipeline->LPUSH($list_name ,json_encode($val));
            }
            return $pipeline->execute();
        } else {
            return $this->redis->LPUSH($list_name, $value);
        }
    }

    public function RPUSH($list_name, $value) {
        return $this->redis->RPUSH($list_name, $value);
    }

    public function LRANGE($list_name, $limit, $offset) {
        return $this->redis->LRANGE($list_name, $limit, $offset);
    }

    public function LLEN($list_name) {
        return $this->redis->LLEN($list_name);
    }

    public function DEL($list_name) {
        return $this->redis->DEL($list_name);
    }
    public function isConnected()
    {
        return $this->redis !== null;
    }

}
