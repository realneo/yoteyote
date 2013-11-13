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
                <?php include('includes/new_user_form.php'); ?>
                <div id="content">
                </div>
            </div>
        </div>
    </div>