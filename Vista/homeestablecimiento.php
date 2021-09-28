<section class="wrapper" ng-app="AngularJSHomeEs" ng-controller="AngularHomeEsController as angCtrl">
  <link href="css/slider.css" rel="stylesheet" />
  <div class="row">
   <div class="col-lg-12">
     <h3 class="page-header"><i class="fa fa fa-bars"></i> Ambiente Estudio Establecimientos</h3>
   </div>
  </div>
     <!-- page start-->
     <div class="row">
       <section class="panel" style="width: 100%">
                          <div class="panel-body">
                              <form class="form-horizontal"  method="POST">
                                  <div>
                                   
                                    
                                    <?php $c->cargarNoticias($ID_ESTA);?>
                                  </div>
     
          


                              </form>
                          </div>
                      </section>
     </div>







</section>

<script type="text/javascript" src="../Controlador/homeestablecimiento.js"></script>
<script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    let currentSlide = 1;
    // Javascript for image slider manual navigation
    var manualNav = function(manual){
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
          btn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
      });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) => {
            activeSlide.classList.remove('active');
          });

        slides[i].classList.add('active');
        btns[i].classList.add('active');
        i++;

        if(slides.length == i){
          i = 0;
        }
        if(i >= slides.length){
          return;
        }
        repeater();
      }, 10000);
      }
      repeater();
    }
    repeat();
    </script>
