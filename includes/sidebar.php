<div class="aside-block">

  <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular"
        type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending"
        type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button"
        role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
    </li>
  </ul>

  <div class="tab-content" id="pills-tabContent">

    <!-- Popular -->
    <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
    <?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.AuthorName as author,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Popular=1 order by tblposts.id desc limit 5");
while ($row=mysqli_fetch_array($query)) {

?>
      <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date"><?php echo htmlentities($row['category'])?></span> <span class="mx-1">&bullet;</span>
          <span><?php echo htmlentities($row['postingdate']);?></span></div>
        <h2 class="mb-2"><a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a></h2>
        <span class="author mb-3 d-block"><?php echo htmlentities($row['author'])?></span>
      </div>

      <?php } ?>

      <!--div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
          <span>Jul 5th '22</span></div>
        <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New
            Haircut</a></h2>
        <span class="author mb-3 d-block">Jenny Wilson</span>
      </div>

      <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
          <span>Jul 5th '22</span></div>
        <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
        <span class="author mb-3 d-block">Jenny Wilson</span>
      </div>

      <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
          <span>Jul 5th '22</span></div>
        <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
        <span class="author mb-3 d-block">Jenny Wilson</span>
      </div>

      <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span>
          <span>Jul 5th '22</span></div>
        <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
        <span class="author mb-3 d-block">Jenny Wilson</span>
      </div>

      <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
          <span>Jul 5th '22</span></div>
        <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
        <span class="author mb-3 d-block">Jenny Wilson</span>
      </div-->
    </div> <!-- End Popular -->

    <!-- Trending -->
    <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
    <?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.AuthorName as author,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Trending=1 order by tblposts.id desc limit 5");
while ($row=mysqli_fetch_array($query)) {

?>
      <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date"><?php echo htmlentities($row['category'])?></span> <span class="mx-1">&bullet;</span>
          <span><?php echo htmlentities($row['postingdate']);?></span></div>
        <h2 class="mb-2"><a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a></h2>
        <span class="author mb-3 d-block"><?php echo htmlentities($row['author'])?></span>
      </div>

      <?php } ?>
    </div> <!-- End Trending -->

    <!-- Latest -->
    <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
      <?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.AuthorName as author,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc limit 5");
while ($row=mysqli_fetch_array($query)) {

?>

      <div class="post-entry-1 border-bottom">
        <div class="post-meta"><span class="date"><?php echo htmlentities($row['category'])?></span> <span
            class="mx-1">&bullet;</span>
          <span><?php echo htmlentities($row['postingdate']);?></span></div>
        <h2 class="mb-2"><a
            href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
        </h2>
        <span class="author mb-3 d-block"><?php echo htmlentities($row['author'])?></span>
      </div>
      <?php } ?>

    </div> <!-- End Latest -->

  </div>
</div>

<div class="aside-block">

  <h3 class="aside-title">Weather Forecast</h3>
  <script>
    (function (d, s, id) {
      if (d.getElementById(id)) {
        if (window.__TOMORROW__) {
          window.__TOMORROW__.renderWidget();
        }
        return;
      }
      const fjs = d.getElementsByTagName(s)[0];
      const js = d.createElement(s);
      js.id = id;
      js.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";

      fjs.parentNode.insertBefore(js, fjs);
    })(document, 'script', 'tomorrow-sdk');
  </script>

  <div class="tomorrow" data-location-id="076749,077018,076977,077125,076800,077002" data-language="EN"
    data-unit-system="METRIC" data-skin="dark" data-widget-type="current6"
    style="padding-bottom:22px;position:relative;">
    <a href="weather.php" rel="nofollow noopener noreferrer" target="_blank"
      style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;">
      <div class="post-meta">Other Locations</div>
      <!--img alt="Powered by the Tomorrow.io Weather API"
        src="https://weather-website-client.tomorrow.io/img/powered-by.svg" width="250" height="18" /-->
    </a>
    <a href="https://www.tomorrow.io/weather-api/" target="_blank" style="position: absolute; bottom: 10; transform: translateX(-50%); left: 50%;">-</a>
  </div>

</div><!-- End Video -->

<div class="aside-block">
  <h3 class="aside-title">Categories</h3>
  <ul class="aside-links list-unstyled">
    <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>

    <li><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><i class="bi bi-chevron-right"></i>
        <?php echo htmlentities($row['CategoryName']);?></a></li>
    <?php } ?>
  </ul>
</div><!-- End Categories -->

<div class="aside-block">
  <h3 class="aside-title">Tags</h3>
  <ul class="aside-tags list-unstyled">
    <?php $query=mysqli_query($con,"select SubCategoryId,SubCategory from tblsubcategory");
while($row=mysqli_fetch_array($query))
{
?>
    <li><a href="tag.php?scid=<?php echo htmlentities($row['SubCategoryId'])?>">
        <?php echo htmlentities($row['SubCategory']);?></a></li>

    <?php } ?>
  </ul>
</div><!-- End Tags -->