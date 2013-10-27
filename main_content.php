<?php include'includes/new_user_form.php'; ?>    
    <div class="container-fluid">
        <div class="row-fluid">
            
            <div class="span2">
                <!--Sidebar content-->
                
               <div id="sort_tab" class="btn-group" data-toggle="buttons-radio">
                    <a id="will_sort" href='' class="btn success" data-toggle="tab">Wills</a>
                    <a id='all_sort' href='' class='btn active' data-toggle='tab'>View All</a>
                    <a id="want_sort" href='' class="btn red_color" data-toggle="tab">Wants</a>
                </div>
            </div>
            
            <div class="span12">
                <!--Body content-->
                <!--<div id='posts'></div> -->
                <div class="alert_content alert"></div>
                <ul class="thumbnails">
                    <div id='posts'></div>
                </ul>
                
                <div id="content">
                    <div class='loader'><img src='images/loader.gif' alt='Loading' /></div>
                </div>
            </div>
        </div>
    </div>