<div class="d-flex justify-content-between p-3">
    <div class="" style="width: 136px">
        <div class="countdown">
            <div class="countdown-container" id="countdown"></div>
        </div>
        <script type="text/template" id="countdown-template">
            <div class="time <%= label %>">
                <span class="count curr top"><%= curr %></span>
                <span class="count next top"><%= next %></span>
                <span class="count next bottom"><%= next %></span>
                <span class="count curr bottom"><%= curr %></span>
            </div>
        </script>
    </div>
    <div class="logo" style="background-image: url(images/logo.png)"></div>
</div>
