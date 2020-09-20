class github_repo {
    constructor(repo_name, repo_desc, repo_url, repo_language, repo_create, repo_update) {
        this.name = repo_name;
        this.desc = repo_desc;
        this.html_url = repo_url;
        this.language = repo_language;
        this.create_date = repo_create;
        this.update_date = repo_update;
    }
    get get_name() {
        return this.name;
    }
}

function github_repositories() {
    let repos = [];
    var pom_name;
    var pom_url;
    var pom_desc;
    var pom_language;
    var pom_create;
    var update_pom;
    var i = 0;
    $.getJSON('https://api.github.com/users/MigotMateusz/repos?sort=updated',  function(data) {
        $.each(data, function(indexData, jsonData) {
            if(i == 3)
                return false;
            $.each(jsonData, function(key, value) {
                if(key == "name")
                    pom_name = value;
                if(key == "html_url") 
                    pom_url = value;
                if(key == "description")
                    pom_desc = value;
                if(key == "created_at")
                    pom_create = value;
                 if(key == "updated_at") {
                    update_pom = value;
                }  
                if (key == "language") {
                    if (value == null)
                        pom_language = " ";
                    else
                        pom_language = value;
                    var newRepo = new github_repo(pom_name, pom_desc, pom_url, pom_language, pom_create, update_pom);
                    repos.push(newRepo);
                    i++;
                }
            });
        });
        console.log(repos);
        show_repos(repos);
    });
}

github_repositories();

function show_repos(repositories) {
    var keys = Object.keys(repositories);
    var docFrag = document.createDocumentFragment();
    for (var i = 0; i < keys.length; i++) {
        var tempNode = document.querySelector("tr[data-type='template']").cloneNode(true);
        tempNode.querySelector("a").textContent = repositories[i].name;
        tempNode.querySelector("a").href = repositories[i].html_url;
        tempNode.querySelector("th.desc-col").textContent = repositories[i].desc;
        tempNode.querySelector("th.lang-col").textContent = repositories[i].language;
        tempNode.style.display = "table-row";
        docFrag.appendChild(tempNode);

    }
    document.getElementById("table-body").appendChild(docFrag);
    delete docFrag;
}
