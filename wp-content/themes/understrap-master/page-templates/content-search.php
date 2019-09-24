<section class="bg-gradient-primary search-box" data-separator="rounded-left" data-separator-orientation="bottom">
    <div class="container pt-md">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
                    <div class="form-group bg-white rounded px-2 py-2 shadow">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group input-group-transparent">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0"><i class="fa fa-search"></i></span>
                                    </div>
                                    <input type="hidden" name="cat" value="26">
                                    <input type="text" name="s" value="<?php echo  get_search_query() ?>" class="form-control border-0 shadow-none" placeholder="试试手气吧">
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-primary btn-icon">
                                    <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                                    <span class="btn-inner--text">Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>