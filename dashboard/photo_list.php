<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta charset="UTF-8">
    <title>LightFinger</title>
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link href="../css/view.css" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/lightslider.min.css" />
</head>
<body>

<div class="outer">
   <div class="left_panel">
       <div class="logo">
            <img src="../images/Logo.png">
        </div>
       <!-- <div class="pnel_tab">
           <a href="view.html">
            <section class="active">All Photos</section>
           </a>
           <a href="view_complete.html">
            <section>Completed</section>
           </a>
        </div> -->
    </div>
    <div class="right_panel">
        <div class="panel_head">
            <section class="tab_nav active_tab" data-id="#all_photos">
                Sorted
            </section>
            <section class="tab_nav" data-id="#selected_photos">
                Pending
            </section>
            <section class="tab_nav" data-id="#finished_photos">
                Finished
            </section>
            <div class="sub_pan_btn right">New Album</div>
            <div class="clear"></div>
        </div>
        <div class="panel_body">
            <div class="common_panel panel_all" id="all_photos">
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
            </div>
            <div class="common_panel panel_selected" id="selected_photos">
                    <div class="panel_blocks">
                        </div>
                        <div class="panel_blocks">
                        </div>
                        <div class="panel_blocks">
                        </div>
                        <div class="panel_blocks">
                        </div>
                        <div class="panel_blocks">
                        </div>
                        <div class="panel_blocks">
                        </div>
            </div>
            <div class="common_panel panel_all" id="finished_photos">
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
                <div class="panel_blocks">
                </div>
            </div>
        <div class="slider_popup">
            <div class="slide_close"></div>
            <div class="demo">
                <ul id="lightSlider">
                    <li data-thumb="images/blk_1.png">
                        <img src="images/blk_1.png" />
                        <!-- <input type="checkbox"> -->
                        <div class="slide_btm">
                            <section>
                                <div class="check_slide">
                                    <div class="check_slide_select"></div>
                                </div>
                                erwewe
                            </section>
                        </div>
                    </li>
                    <li data-thumb="images/blk_2.png">
                        <img src="images/blk_2.png" />
                        <!-- <input type="checkbox"> -->
                        <div class="slide_btm">
                            <section>
                                <div class="check_slide">
                                    <div class="check_slide_select"></div>
                                </div>
                                erwewe
                            </section>
                        </div>
                    </li>
                    <li data-thumb="images/blk_3.png">
                        <img src="images/blk_3.png" />
                        <!-- <input type="checkbox"> -->
                        <div class="slide_btm">
                            <section>
                                <div class="check_slide">
                                    <div class="check_slide_select"></div>
                                </div>
                                erwewe
                            </section>
                        </div>
                    </li>
                    <li data-thumb="images/blk_4.png">
                        <img src="images/blk_4.png" />
                        <!-- <input type="checkbox"> -->
                        <div class="slide_btm">
                            <section>
                                <div class="check_slide">
                                    <div class="check_slide_select"></div>
                                </div>
                                erwewe
                            </section>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> 
    
</div>


<script rel="script" src="js/jquery-1.8.2.min.js"></script>
<script rel="script" src="js/main.js"></script>
<script rel="script" src="js/view.js"></script>
<script src="js/lightslider.min.js"></script>

<script type="text/javascript">
    $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 9
});
  </script>
</body>
</html>