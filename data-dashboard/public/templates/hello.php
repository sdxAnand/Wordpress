<style>
    .popup .overlay {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
        display: none;
    }

    .popup .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        background: #fff;
        width: 95%;
        max-width: 500px;
        height: 250px;
        z-index: 2;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
        font-family: "Open Sans", sans-serif;
    }

    .popup .close-btn {
        cursor: pointer;
        position: absolute;
        right: 20px;
        top: 20px;
        width: 30px;
        height: 30px;
        background: #222;
        color: #fff;
        font-size: 25px;
        font-weight: 600;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
    }

    .popup.active .overlay {
        display: block;
    }

    .popup.active .content {
        transition: all 300ms ease-in-out;
        transform: translate(-50%, -50%) scale(1);
    }

    /* button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 15px;
        font-size: 18px;
        border: 2px solid #222;
        color: #222;
        text-transform: uppercase;
        font-weight: 600;
        background: #fff;
    } */
</style>
<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn" onclick="togglePopup()">×</div>
        <h1>Title</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aspernatur laborum rem sed
            laudantium excepturi veritatis voluptatum architecto, dolore quaerat totam officiis nisi animi accusantium
            alias inventore nulla atque debitis.</p>
    </div>
</div>

<button onclick="togglePopup()">Show Popup</button>

<script>
    function togglePopup() {
        document.getElementById("popup-1").classList.toggle("active");

    }
</script>