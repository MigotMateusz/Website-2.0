class BlogPost {
    constructor(title, desc, date, img, address) {
        this.postTitle = title;
        this.description = desc;
        this.postDate = date;
        this.image = img;
        this.url = address;
    }
}

function latest_blog_posts() {
    let array = [];
    var title;
    var description;
    var link_url;
    var date;
    var img_link;

    $.getJSON('http://mateuszmigot.pl/blog/wp-json/wp/v2/posts?per_page=3&_embed', function (data) {
        $.each(data, function (index, jsonData) {
            $.each(jsonData, function (key, value) {
                if (key == "date") {
                    var index = value.indexOf('T');
                    value = value.substring(0, index);
                    date = value;
                }
                if (key == "title") {
                    $.each(value, function (key, value) {
                        title = value;
                    });
                }
                if (key == "link") {
                    link_url = value;
                }
                if (key == "excerpt") {
                    $.each(value, function (render, desc) {
                        if (render == "rendered") {
                            var pstart = desc.substring(24, desc.size - 3);
                            desc = desc.replace(pstart, '');
                            var pend = desc.substring(desc.length - 5);
                            desc = desc.replace(pend, '');
                            description = desc;
                        }

                    });
                }
                if (key == "_embedded") {
                    $.each(value, function (keys, mediaData) {
                        if (keys == "wp:featuredmedia") {
                            $.each(mediaData, function (pomIndex, keyValues) {
                                $.each(keyValues, function (keyValue, properValue) {
                                    if (keyValue == "link") {
                                        img_link = properValue;
                                        var newPost = new BlogPost(title, description, date, img_link, link_url);
                                        array.push(new BlogPost(title, description, date, img_link, link_url));
                                    }
                                });
                            });
                        }
                    });
                }
            });

        });
        console.log(array);
        show_blog_posts(array);
    });
}

latest_blog_posts();

function show_blog_posts(array) {
    var classes = ["animate__fadeInLeft", "animate__fadeInUp", "animate__fadeInRight"];
    var keys = Object.keys(array);
    var docFrag = document.createDocumentFragment();
    for (var i = 0; i < keys.length; i++) {
        var tempNode = document.querySelector("div[data-type='template']").cloneNode(true);
        tempNode.querySelector(".card").className += classes[i];
        tempNode.querySelector("h5.card-title > a").textContent = array[i].postTitle;
        tempNode.querySelector("h5.card-title > a").href = array[i].url;
        tempNode.querySelector("h5.card-title > a").title = array[i].postTitle;
        tempNode.querySelector("p.card-text").textContent = array[i].description;
        tempNode.querySelector("small.text-muted").textContent = array[i].postDate;
        tempNode.querySelector("img").src = array[i].image;
        tempNode.querySelector("button > a").href = array[i].url;
        tempNode.querySelector("a.img-link").href = array[i].url;
        tempNode.style.display = "block";
        docFrag.appendChild(tempNode);

    }
    document.getElementById("blog-posts-section").appendChild(docFrag);
    delete docFrag;
}