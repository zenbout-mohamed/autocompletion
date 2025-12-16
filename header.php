<?php require 'config.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocompletion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class ="gb-gray-50 text-slay-800">
    <header class ="bg-white shadow-sm">
        <nav class ="max-w-4xl mx-auto px-4 py-6 flex items-center gap-4">
            <a href="index.php" class ="text-2xl font-semibold">Autocompletion</a>

            <form action="recherche.php" method="get" class ="flex-1 relative" autocomplete="off">
                <div class ="flex items-center">
                    <input type="text" id="search" name="search" placeholder ="Rechercher..." class ="w-full rounded-l-xl border border-gray-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-300"/>
                    <button type="submit" class ="bg-indigo-600 text-white px-4 py-2 rounded-r-xl">Rechercher</button>
                </div>

                <ul id="suggestions" class ="absolute left-0 right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden max-h-64 overflow-y-auto hidden"></ul>
            </form>
        </nav>
    </header>

    <script>
    $(function(){
        const $input = $('#search');
        const $list = $('#suggestions');


    function renderItems(startMatches, containsMatches) {
    $list.empty();
    if(startMatches.length === 0 && containsMatches.length === 0) {
        $list.hide();
        return;
    }


    startMatches.forEach(item => {
    $list.append(`<li class="px-4 py-2 hover:bg-gray-50"><a href="element.php?id=${item.id}" class="block">${item.nom}</a></li>`);
    });


    if(startMatches.length > 0 && containsMatches.length > 0) {
        $list.append('<li class="px-4 py-1 text-xs text-gray-400">──────────</li>');
    }


    containsMatches.forEach(item => {
    $list.append(`<li class="px-4 py-2 hover:bg-gray-50"><a href="element.php?id=${item.id}" class="block">${item.nom}</a></li>`);
    });


    $list.show();
}

    let xhr = null;
    $input.on('input', function(){
    const q = $(this).val().trim();
    if(q === '') {
        $list.hide();
        return;
    }


    if(xhr) xhr.abort();
    xhr = $.getJSON('suggestions.php', { q }, function(data){
    renderItems(data.start, data.contains);
    });
    });


    // fermer si clic en dehors
    $(document).on('click', function(e){
    if(!$(e.target).closest('#suggestions, #search').length) $list.hide();
    });
    });
</script>   
</body>
</html>

