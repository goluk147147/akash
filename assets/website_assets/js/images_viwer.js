document.addEventListener('DOMContentLoaded', () => {

    const openModalButton = document.getElementById('open-modal');
    const modal = document.getElementById('myModal');
    var closeModal1 = document.getElementsByClassName('close')[1];
    const viewer = document.querySelector('.viewer');
    const img = document.getElementById('image-viewer');
    const zoomInButton = document.getElementById('zoom-in');
    //alert(zoomInButton);
    const zoomOutButton = document.getElementById('zoom-out');
    //const downloadButton = document.getElementById('download-btn');
    let scale = 1;
    let imgX = 0,
        imgY = 0;
    let isZoomed = false;
    const maxZoom = 4;
    const zoomSteps = 3;
    const zoomIncrement = maxZoom / zoomSteps;

    const setTransform = () => {
        img.style.transform = `translate(${imgX}px, ${imgY}px) scale(${scale})`;
    };

    const onWheel = (e) => {
        e.preventDefault();
        scale += e.deltaY * -0.01;
        scale = Math.min(Math.max(1, scale), maxZoom);
        isZoomed = scale > 1;
        if (!isZoomed) {
            imgX = 0;
            imgY = 0;
        }
        setTransform();
    };

    const onMouseMove = (e) => {
        if (isZoomed) {
            const rect = viewer.getBoundingClientRect();
            const offsetX = ((e.clientX - rect.left) / rect.width - 0.5) * 2;
            const offsetY = ((e.clientY - rect.top) / rect.height - 0.5) * 2;
            const maxX = (img.width * scale - rect.width) / 2;
            const maxY = (img.height * scale - rect.height) / 2;
            imgX = -offsetX * maxX;
            imgY = -offsetY * maxY;
            setTransform();
        }
    };

    const downloadImage = () => {
        const link = document.createElement('a');
        link.href = img.src;
        link.download = 'downloaded-image.jpg';
        link.click();
    };

    zoomInButton.addEventListener('click', () => {
        scale = Math.min(scale + zoomIncrement, maxZoom);
        isZoomed = scale > 1;
        setTransform();
    });

    zoomOutButton.addEventListener('click', () => {
        scale = Math.max(scale - zoomIncrement, 1);
        isZoomed = scale > 1;
        if (!isZoomed) {
            imgX = 0;
            imgY = 0;
        }
        setTransform();
    });

    //downloadButton.addEventListener('click', downloadImage);

    viewer.addEventListener('wheel', onWheel);
    viewer.addEventListener('mousemove', onMouseMove);

    openModalButton.onclick = () => {
        modal.style.display = 'block';
    };

    closeModal1.onclick = () => {
        modal.style.display = 'none';
    };

    window.onclick = (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };

});
