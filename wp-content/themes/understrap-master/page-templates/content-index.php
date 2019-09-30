<section class="slice slice-lg solutions-box">
    <video loop="loop" id="home_video" poster="images/home/video.jpg" muted="muted" preload="auto" autoplay="autoplay">
        <source src="https://sblog.teamillion.com/video/home.mp4" type="video/mp4">
<!--        <source src="--><?php //echo get_template_directory_uri().'/css/images/scrum.mp4' ?><!--" type="video/mp4">-->
    </video>
    <textarea spellcheck="false" class="textarea"></textarea>
</section>

<section class="bg-secondary" style="padding: 5rem 0rem;">
    <div class="container">
        <div class="row row-grid">
            <div class="col-lg-4">
                <div class="card shadow-sm shadow--hover">
                    <div class="py-5 text-center">
                        <img src="<?php echo get_template_directory_uri().'/css/images/desktop-download.png' ?>">
                    </div>
                    <div class="px-4 pb-5 text-center">
                        <h5 class="h4">地道的美式发音</h5>
                        <p class="mt-2">你可曾因为发音不准怕被人嘲笑而不敢开口。没有关系，今天我们精选了腾讯视频上数十部美国原声大片
                            进行字幕将对，将带给您纯正的美式发音进行教学</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm shadow--hover">
                    <div class="py-5 text-center">
                        <img src="<?php echo get_template_directory_uri().'/css/images/paint-palette.png' ?>">
                    </div>
                    <div class="px-4 pb-5 text-center">
                        <h5 class="h4">人工校对支持精准回放</h5>
                        <p class="mt-2">如果您曾经尝试过看美剧的方式来练习口语，您一定注意过这样一个细节，字幕的时间90%以上是不精准的，
                            截止目前为止没有任何一家软件能提供精准的回放功能。
                            因为要精准校对一个90分钟的字幕，大约需要8-16个小时。</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm shadow--hover">
                    <div class="py-5 text-center">
                        <img src="<?php echo get_template_directory_uri().'/css/images/add-property.png' ?>">
                    </div>
                    <div class="px-4 pb-5 text-center">
                        <h5 class="h4">支持微信小程序</h5>
                        <p class="mt-2">英语学习中只靠背单词是不行的，但没有单词积累也是万万不行的。当您在学习的过程中遇到不会的生词，
                            可以通过收录功能实时同步到您的生词本中，任何时候都可以在微信小程序中进行复习测试</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slice slice-lg">
    <div class="container">
    </div>
    <div class="container">
        <div class="mb-md text-center">
            <h3 class="heading h2">一分钟开启学习之旅，绿色环保，不占用硬盘空间</h3>
            <div class="fluid-paragraph mt-3">
            </div>
            <video loop="loop" id="home_video" poster="images/home/video.jpg" muted="muted" preload="auto" autoplay="autoplay" style="width: 100%; margin: 0 auto;">
                <source src="https://sblog.teamillion.com/video/install.mp4?v=1" type="video/mp4">
                <!--        <source src="--><?php //echo get_template_directory_uri().'/css/images/scrum.mp4' ?><!--" type="video/mp4">-->
            </video>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="px-4">
                    <div class="mb-4">
                        <div class="icon icon-lg icon-shape shadow rounded-circle text-primary">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                    </div>
                    <h5 class="h5 mb-3">双语对照</h5>
                    <p>每一部大片都提供了中英双语对照，前期您可以同时开启熟悉剧情，然后关闭中文进行逐句复习。</p>
                </div>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="px-4">
                    <div class="mb-4">
                        <div class="icon icon-lg icon-shape shadow rounded-circle text-primary">
                            <i class="fa fa-code"></i>
                        </div>
                    </div>
                    <h5 class="h5 mb-3">生词查询</h5>
                    <p>当您遇到生词，鼠标轻轻一划，将开启实时查词功能，系统将为您展示该生词的解释、例句、使用频率</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="px-4">
                    <div class="mb-4">
                        <div class="icon icon-lg icon-shape shadow rounded-circle text-primary">
                            <i class="fa fa-tint"></i>
                        </div>
                    </div>
                    <h5 class="h5 mb-3">小程序配套</h5>
                    <p>除了提供生词复习功能外，还有更多的词库、TED演讲视频提供学习。结合记忆曲线，提供科学系统的复习指导</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slice slice-lg bg-secondary">
    <?php
      $url = 'https://www.worksouls.com/api/v1/movies?keyword=&start=0&limit=15';
      $data = file_get_contents($url);
      $movies = json_decode($data,true);
    ?>
    <style>
        .movies {
            text-align: center;
            width: 1200px;
            margin: 0px auto 0
        }

        .movies .movie {
            text-align: left;
            width: 185px;
            height: 300px;
            margin-right: 18px;
            margin-bottom: 40px;
            line-height: 18px;
            display: inline-block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: relative
        }

        .movies .movie .status {
            position: absolute;
            right: 10px;
            top: 10px;
            color: #fff;
            font-size: 24px;
            font-weight: 700
        }

        .movies .movie .name {
            font-weight: 700;
            letter-spacing: 0;
            font-size: 14px;
            color: #111
        }

        .movies .movie .pic {
            display: block;
            width: 185px;
            height: 260px;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 3px;
            background: #f8f8f8;
            margin-bottom: 14px
        }

        .movies .movie .actors {
            display: block;
            color: #999;
            width: 100%;
            margin-top: 3px;
            overflow: hidden;
            font-size: 13px;
            line-height: 20px;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: default
        }
    </style>
    <div class="container">
        <div class="mb-md text-center">
            <h3>依托腾讯视频提供服务、海外原声大片资源应有尽有</h3>
            <div class="fluid-paragraph text-center mt-4">
                <p class="summary lh-180">学飞从未</p>
            </div>
        </div>
        <div class="row row-grid">
            <div class="col-md-24 movies">
                <?php foreach ($movies as $movie): ?>
                    <div class="movie">
                        <i class="iconfont icon-shangchuan status"></i> <!---->
                        <img src="<?php echo $movie['preview']['url'] ?>" class="pic">
                        <div class="name"><?php echo $movie['name'] ?></div>
                        <div class="actors"><?php echo $movie['description'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<section class="slice slice-lg delimiter-top">
    <div class="container">
        <div class="mb-md text-center">
            <h3 class="h2">超过 <span class="text-primary">20000</span> 用户的信任之选</h3>
            <div class="fluid-paragraph mt-3">
                <p class="summary">鱼骨项目管理软件——为百万中小企业创造价值.</p>
            </div>
        </div>
        <div class="blurable--hover">
            <a href="#">
                <div class="row blurable-item">
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <div class="card px-4 py-4">
                            <img src="../assets/img/prv/partners/img-1.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <div class="card px-4 py-4">
                            <img src="../assets/img/prv/partners/img-2.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <div class="card px-4 py-4">
                            <img src="../assets/img/prv/partners/img-3.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <div class="card px-4 py-4">
                            <img src="../assets/img/prv/partners/img-4.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <div class="card px-4 py-4">
                            <img src="../assets/img/prv/partners/img-5.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <div class="card px-4 py-4">
                            <img src="../assets/img/prv/partners/img-6.png" class="img-fluid">
                        </div>
                    </div>
                </div>
                <span class="blurable-hidden btn btn-primary btn-circle">立即加入，提升团队效率</span>
            </a>
        </div>
    </div>
</section>


<section class="slice slice-lg bg-secondary">
    <span class="tongue tongue-top"><i class="fa fa-angle-up"></i></span>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 text-center">
                <h3 class="h3 font-weight-400">立刻开始体验 <span class="font-weight-700">鱼骨项目管理软件</span> .</h3>
                <div class="mt-5">
                    <a href="/sign-in" target="_blank" class="btn btn-primary btn-circle btn-translate--hover px-4">注册加入<span class="badge badge-pill badge-danger"></span></a>
                    <a href="mailto:daidh@163.com?subject=意见反馈" class="btn btn-link">意见反馈?</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    function flashTextarea(){
        $('.ta').css({'outline':'1px solid rgba(255,255,0,0.7)'})
        setTimeout(function(){
            $('.ta').css({'outline':'1px solid rgba(255,255,0,0)'})
        },50)
    }

    $(function(){
        const lines = [
            "您想成为像他们一样的白领精英吗...",
            "\n\n您想拥有一口地道流利的英语吗...",
            "\n\n或许您曾经也如我有过这样的目标，然而却又在不经意间选择了放弃。",
            "\n\n今天，您还要继续犹豫吗？立刻加入我们的英语学习计划吧。",
        ];

        $('.textarea').focus();
        $('.textarea').typetype(lines[0], {
                t:150,
                e:0,
                callback: function() {
                    $('body').addClass('reveal')
                }
            })
            .delay(1500)
            .typetype(lines[1],{
                t:100,
                e:0
            })
            .fadeTo(400,0.3).delay(1000)
            //.queue(function(){$('#secondhalf').fadeIn(1000);$('textarea').dequeue()}).delay(4000).fadeTo(400,1.0).delay(1000)
            .typetype(lines[2],{
                // keypress:flashTextarea,
                t:100,
                e:0
            })
            // .typetype(lines[0], {
            //     t:200,
            //     e:0.2, // the default error rate is 0.04
            //     callback: function(){
            //         $("#usage").addClass('show')
            //     }
            // })
            .delay(2500)
            .backspace(lines[2].length)
            .typetype(lines[3])

    })

</script>
<style>
    .textarea{
        background: transparent;
        opacity: 1;
        position: absolute;
        left: 10%;
        right: 0;
        top: 200px;
        bottom: 0;
        overflow: hidden;
        border: none;
        color: white;
        font-size: 20px;
        outline: none !important;
        width: 80%;
    }
</style>