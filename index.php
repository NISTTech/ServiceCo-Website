<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="./logo.png">
        <title>ServiceCo</title>
        <link rel="stylesheet" href="./style.css">
        <script>var egassem = "z9MbDcm43640Sb31q80Jkl4fN0TT5Fidg_7S7p1f8tqVh_maxnaW1KULYi4zatlmCSqboylWiwW4EdVHiqhh-wTIZogg5fYc4J3noN1o0c6bsH_LUM1pSb9Oo7ZeZ1CBbtbuOESmhcqtSAML1v-JtWen4nicbVQ_bf2j_61URHTENj9cufV-eTCVj5uoHp88";</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <a href="./index.php">
                <img src="./logo.png" alt="ServiceCo Logo">
            </a>
            <h1>Welcome to Service Shop</h1>
            <form action="#" method="GET" class="search-form">
                <input type="text" id="search-box" placeholder="Search in ServiceCo" autocomplete="off">
                <button type="submit">Search</button>
            </form>
            <div id="search-results" class="dropdown-content"></div>
            <script>
                $(document).ready(function() {
                    $('.search-form').submit(function(event) {
                        event.preventDefault();
                        var searchTerm = $('#search-box').val().toLowerCase();
                        if (searchTerm) {
                            $.get('search.php', { search: searchTerm }, function(response) {
                                $('#search-results').html(response).show();
                            }).fail(function() {
                                $('#search-results').html('<div class="error">There was an error.</div>').show();
                            });
                        } else {
                            $('#search-results').hide();
                        }
                    });
                    $(document).click(function(e) {
                        if (!$(e.target).is('#search-box') && !$(e.target).closest('#search-results').length) {
                            $('#search-results').hide();
                        }
                    });
                });
            </script>
        </header>
        <main>
            <section id="goals">
                <h2>Our Goals</h2>
                <p>An overview of sustainable and service products with their pricing and contact details supporting and strengthening our community partnership.</p>
                <img src="sdg.png" alt="SDG" style="max-width: 100%; height: auto;">
            </section>
            <section id="service-groups">
                <h2>Service Groups</h2>
                <div class="logo-wall">
                    <a href="./servicegroups/anglewishes/index.php"><img src="./servicegroups/anglewishes/logo.png" alt="anglewishes Logo"></a>
                    <a href="./servicegroups/arc/index.php"><img src="./servicegroups/arc/logo.png" alt="arc Logo"></a>
                    <a href="./servicegroups/baansaijai/index.php"><img src="./servicegroups/baansaijai/logo.png" alt="baansaijai Logo"></a>
                    <a href="./servicegroups/beatasone/index.php"><img src="./servicegroups/beatasone/logo.png" alt="beatasone Logo"></a>
                    <a href="./servicegroups/catnist/index.php"><img src="./servicegroups/catnist/logo.png" alt="catnist Logo"></a>
                    <a href="./servicegroups/cof/index.php"><img src="./servicegroups/cof/logo.png" alt="cof Logo"></a>
                    <a href="./servicegroups/connectingcommunities/index.php"><img src="./servicegroups/connectingcommunities/logo.png" alt="connectingcommunities Logo"></a>
                    <a href="./servicegroups/cured/index.php"><img src="./servicegroups/cured/logo.png" alt="cured Logo"></a>
                    <a href="./servicegroups/eco/index.php"><img src="./servicegroups/eco/logo.png" alt="eco Logo"></a>
                    <a href="./servicegroups/edibubble/index.php"><img src="./servicegroups/edibubble/logo.png" alt="edibubble Logo"></a>
                    <a href="./servicegroups/fairnist/index.php"><img src="./servicegroups/fairnist/logo.png" alt="fairnist Logo"></a>
                    <a href="./servicegroups/fashionist/index.php"><img src="./servicegroups/fashionist/logo.png" alt="fashionist Logo"></a>
                    <a href="./servicegroups/feminist/index.php"><img src="./servicegroups/feminist/logo.png" alt="feminist Logo"></a>
                    <a href="./servicegroups/forestrangers/index.php"><img src="./servicegroups/forestrangers/logo.png" alt="forestrangers Logo"></a>
                    <a href="./servicegroups/freetobe/index.php"><img src="./servicegroups/freetobe/logo.png" alt="freetobe Logo"></a>
                    <a href="./servicegroups/friendsoftheimmanuleorchestra/index.php"><img src="./servicegroups/friendsoftheimmanuleorchestra/logo.png" alt="friendsoftheimmanuleorchestra Logo"></a>
                    <a href="./servicegroups/greenlight/index.php"><img src="./servicegroups/greenlight/logo.png" alt="greenlight Logo"></a>
                    <a href="./servicegroups/helpinghearts/index.php"><img src="./servicegroups/helpinghearts/logo.png" alt="helpinghearts Logo"></a>
                    <a href="./servicegroups/mushiemushie/index.php"><img src="./servicegroups/mushiemushie/logo.png" alt="mushiemushie Logo"></a>
                    <a href="./servicegroups/nest/index.php"><img src="./servicegroups/nest/logo.png" alt="nest Logo"></a>
                    <a href="./servicegroups/nistcha/index.php"><img src="./servicegroups/nistcha/logo.png" alt="nistcha Logo"></a>
                    <a href="./servicegroups/nistcomunitymarket/index.php"><img src="./servicegroups/nistcomunitymarket/logo.png" alt="nistcomunitymarket Logo"></a>
                    <a href="./servicegroups/nisttech/index.php"><img src="./servicegroups/nisttech/logo.png" alt="nisttech Logo"></a>
                    <a href="./servicegroups/operationsmile/index.php"><img src="./servicegroups/operationsmile/logo.png" alt="operationsmile Logo"></a>
                    <a href="./servicegroups/pfn/index.php"><img src="./servicegroups/pfn/logo.png" alt="pfn Logo"></a>
                    <a href="./servicegroups/phuliphay/index.php"><img src="./servicegroups/phuliphay/logo.png" alt="phuliphay Logo"></a>
                    <a href="./servicegroups/priceless/index.php"><img src="./servicegroups/priceless/logo.png" alt="priceless Logo"></a>
                    <a href="./servicegroups/rescuedglass/index.php"><img src="./servicegroups/rescuedglass/logo.png" alt="rescuedglass Logo"></a>
                    <a href="./servicegroups/revive/index.php"><img src="./servicegroups/revive/logo.png" alt="revive Logo"></a>
                    <a href="./servicegroups/rooftopgarden/index.php"><img src="./servicegroups/rooftopgarden/logo.png" alt="rooftopgarden Logo"></a>
                    <a href="./servicegroups/soap/index.php"><img src="./servicegroups/soap/logo.png" alt="soap Logo"></a>
                    <a href="./servicegroups/tusk/index.php"><img src="./servicegroups/tusk/logo.png" alt="tusk Logo"></a>
                    <a href="./servicegroups/wellnist/index.php"><img src="./servicegroups/wellnist/logo.png" alt="wellnist Logo"></a>
                    <a href="./servicegroups/wishtogether/index.php"><img src="./servicegroups/wishtogether/logo.png" alt="wishtogether Logo"></a>
                    <a href="./servicegroups/woof/index.php"><img src="./servicegroups/woof/logo.png" alt="woof Logo"></a>
                </div>
            </section>
        </main>
        <footer>
            <p>2025 ServiceCo</p>
        </footer>
    </body>
</html>