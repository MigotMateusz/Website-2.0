class github_repo {
    constructor(repo_name, repo_desc, repo_url, repo_create, repo_update) {
        this.name = repo_name;
        this.desc = repo_desc;
        this.html_url = repo_url;
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
    var pom_create;
    $.getJSON('https://api.github.com/users/MigotMateusz/repos?sort=updated',  function(data) {
        $.each(data, function(indexData, jsonData) {

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
                     var update_pom = value;
                     var newRepo = new github_repo(pom_name, pom_desc, pom_url, pom_create, update_pom);
                     repos.push(newRepo);
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
        var tempNode = document.querySelector("dl#repos-section > dt[data-type='template']").cloneNode(true);
        tempNode.querySelector("a").textContent = repositories[i].name;
        tempNode.querySelector("a").href = repositories[i].html_url;
        tempNode.style.display = "inline";
        tempNode.style.color = "blue";
        docFrag.appendChild(tempNode);
        tempNode = document.querySelector("dl#repos-section > dd[data-type='template']").cloneNode(true);
        tempNode.querySelector("p").textContent = repositories[i].desc;
        tempNode.style.display = "inline";
        
        docFrag.appendChild(tempNode);

    }
    document.getElementById("repos-section").appendChild(docFrag);
    delete docFrag;
}
