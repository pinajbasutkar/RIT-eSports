<script>
var name="Shreerang Patwardhan"
var finalsummary ="Spatial Unlimited is a Tech blog where, examples using Google Maps API v3 and Jquery Mobile are shared. I have tried to give back to the developer community as much as I can.";
var finaldate = new Date().toLocaleString();
var a =document.createElement("a");
var h3=document.createElement("h3");
var p=document.createElement("p");
var p1=document.createElement("p");
var li = document.createElement("li");
a.setAttribute('href', "#");
h3.innerHTML="Author: "+name;
p.innerHTML="Description: "+finalsummary;
p1.innerHTML="Last update:"+finaldate;
p1.setAttribute("class","ui-li-aside");
a.appendChild(p1);
a.appendChild(p);
a.appendChild(h3);
li.appendChild(a)

</script>



<script>
    var h3=document.createElement("h3");
    h3.innerHTML=""+headline;
    h3.setAttribute('class','news-item-title');
    
    var img=document.createElement("img");
    img.setAttribute('src',img_url);
    img.setAttribute('alt','News Item Picture');
    img.setAttribute('title','News Item Picture');
    img.setAttribute('class','img-responsive center-div');
    
    var a=document.createElement("a");
    a.setAttribute('data-fancybox','');
    a.setAttribute('data-src','#news-item-1');
    a.setAttribute('href','javascript:;');
    
    var innerDivNewsItem=document.createElement("div");
    innerDivNewsItem.setAttribute('class','news-item');
    
    var outerDivNewsItem=document.createElement("div");
    outerDivNewsItem.setAttribute('class','news-item');
    
    var pNewsItemInfo=document.createElement("p");
    pNewsItemInfo.innerHTML = "By"+author+" "+"|"+" "+date
    pNewsItemInfo.setAttribute('class','news-item-info');
    
    var pNewsItemText=document.createElement("p");
    pNewsItemText.innerHTML = content;
    pNewsItemText.setAttribute('class','col-md-6 col-lg-6 container');
    
    
    a.appendChild(img);
    a.appendChild(h3);
    
    innerDivNewsItem.appendChild(a);
    innerDivNewsItem.appendChild(pNewsItemInfo);
    innerDivNewsItem.appendChild(pNewsItemText);
    
    outerDivNewsItem.appendChild(innerDivNewsItem);
    
    
    
    
</script>





















//If odd
<!--<div class="row center-div">-->
    
    
    
    <div class="col-md-6 col-lg-6 container">
        <div class="news-item">
            <a data-fancybox="" data-src="#news-item-1" href="javascript:;">
                <img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">
                <h3 class="news-item-title">
                    Rogue6 Dominates!!
                </h3>
            </a>
            <p class="news-item-info">
                by Pinaj Basutkar | 4/14/17
            </p>
            <p class="news-item-text">
                Known far and wide as the most dominant programming group on the eastern seaboard, Rogue6 has crushed every level of competition they've faced to date.  Their epic eSports site has drawn rave reviews...
            </p>
        </div>
    </div>

    <div class="news-item-full-container" style="display: none;" id="news-item-2">
        <div class="news-item-full">
            <img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">
            <h3 class="news-item-title">
                Rogue6 Dominates!!
            </h3>
            <p class="news-item-info">
                by Pinaj Basutkar | 4/14/17
            </p>
            <p class="">
                Known far and wide as the most dominant programming group on the eastern seaboard, Rogue6 has crushed every level of competition they've faced to date.  Their epic eSports site has drawn rave reviews from everyone who has had the pleasure to visit this in-beta product.  Here's hoping we see more from this stellar team very soon.
            </p>
        </div>
        <button data-fancybox-close="" class="fancybox-close-small"></button></div>



<!--</div>-->




//If even



<div class="row center-div">
    <div class="col-md-6 col-lg-6 container">
        <div class="news-item">
            <a data-fancybox="" data-src="#news-item-2" href="javascript:;">
                <img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">
                <h3 class="news-item-title">
                    Rogue6 Dominates!!
                </h3>
            </a>
            <p class="news-item-info">
                by Pinaj Basutkar | 4/14/17
            </p>
            <p class="news-item-text">
                Known far and wide as the most dominant programming group on the eastern seaboard, Rogue6 has crushed every level of competition they've faced to date.  Their epic eSports site has drawn rave reviews...
            </p>
        </div>
    </div>
    <div class="news-item-full-container" style="display: none;" id="news-item-2">
        <div class="news-item-full">
            <img src="media/news_events/gaming_background.jpg" alt="News Item Picture" title="News Item Picture" class="img-responsive center-div">
            <h3 class="news-item-title">
                Rogue6 Dominates!!
            </h3>
            <p class="news-item-info">
                by Pinaj Basutkar | 4/14/17
            </p>
            <p class="">
                Known far and wide as the most dominant programming group on the eastern seaboard, Rogue6 has crushed every level of competition they've faced to date.  Their epic eSports site has drawn rave reviews from everyone who has had the pleasure to visit this in-beta product.  Here's hoping we see more from this stellar team very soon.
            </p>
        </div>
        <button data-fancybox-close="" class="fancybox-close-small"></button></div>
</div>


