<!-- Search for Players Section -->
<div class="card" style="margin-top: 20px; margin-left: 20px;">
    <div class="card-header pb-0 border-1">
        <h5 class="mt-4">Search For Players</h5>
    </div>
    <div class="card-body">
        <input id="userSearch" name="search" placeholder="Search for players..." class="form-control w-100" type="text">
        <ul id="userResults" class="list-group mt-2" style="display: none;"></ul>
    </div>
</div>

<!-- Search for Games Section -->
<div class="card" style="margin-top: 20px; margin-left: 20px;">
    <div class="card-header pb-0 border-1">
        <h5 class="mt-4">Search For Games</h5>
    </div>
    <div class="card-body">
        <input id="gameSearch" name="search" placeholder="Search for games..." class="form-control w-100" type="text">
        <ul id="gameResults" class="list-group mt-2" style="display: none;"></ul>
    </div>
</div>


<!-- JavaScript for Search Functionality -->
<script>
    // Search for Games
    document.getElementById('gameSearch').addEventListener('keyup', function() {
        let query = this.value;
        let results = document.getElementById('gameResults');

        if (query.length > 0) {
            fetch(`/search-games?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    results.innerHTML = '';
                    if (data.length > 0) {
                        results.style.display = 'block';
                        data.forEach(game => {
                            let li = document.createElement('li');
                            li.classList.add('list-group-item', 'd-flex', 'align-items-center');

                            let img = document.createElement('img');
                            img.src = `/storage/${game.image}`;
                            img.alt = game.title;
                            img.style.width = '50px';
                            img.style.height = 'auto';
                            img.style.marginRight = '10px';

                            let link = document.createElement('a');
                            link.href = `/games/${game.id}`;
                            link.innerText = game.title;

                            li.appendChild(img);
                            li.appendChild(link);
                            results.appendChild(li);
                        });
                    } else {
                        results.style.display = 'none';
                    }
                });
        } else {
            results.style.display = 'none';
        }
    });

    // Search for Players
    document.getElementById('userSearch').addEventListener('keyup', function() {
        let query = this.value;
        let results = document.getElementById('userResults');

        if (query.length > 0) {
            fetch(`/search-users?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    results.innerHTML = '';
                    if (data.length > 0) {
                        results.style.display = 'block';
                        data.forEach(user => {
                            let li = document.createElement('li');
                            li.classList.add('list-group-item', 'd-flex', 'align-items-center');

                            let img = document.createElement('img');
                            img.src = user.image ? user.image : 'https://api.dicebear.com/6.x/fun-emoji/svg?seed=' + user.name;
                            img.alt = user.name;
                            img.style.width = '50px';
                            img.style.height = 'auto';
                            img.style.marginRight = '10px';

                            let link = document.createElement('a');
                            link.href = `/users/${user.id}`;
                            link.innerText = user.name;

                            li.appendChild(img);
                            li.appendChild(link);
                            results.appendChild(li);
                        });
                    } else {
                        results.style.display = 'none';
                    }
                });
        } else {
            results.style.display = 'none';
        }
    });
</script>
