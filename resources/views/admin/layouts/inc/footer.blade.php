
<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
    <div class="kt-container  kt-container--fluid text-center">
        <div class="kt-footer__copyright">
            Copyright {{date('Y')}} Designed & Developed by
            <a href="http://www.lathransoft.com/" target="_blank" class=""> &nbsp;{{ get_option('developer') }}</a>
        </div>
        {{--<div class="kt-footer__menu">
            <a href="javascript:" target="_blank" class="kt-footer__menu-link kt-link">About</a>
            <a href="javascript:" target="_blank" class="kt-footer__menu-link kt-link">Support</a>
            <a href="javascript:" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
        </div>--}}
    </div>
</div>
<!-- end:: Footer -->
</div>
</div>
</div>

<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5D78FF",
                "dark": "#282A3C",
                "light": "#FFFFFF",
                "primary": "#5867DD",
                "success": "#34BFA3",
                "info": "#36A3F7",
                "warning": "#FFB822",
                "danger": "#FD3995"
            },
            "base": {
                "label": ["#C5CBE3", "#A1A8C3", "#3D4465", "#3E4466"],
                "shape": ["#F0F3FF", "#D9DFFA", "#AFB4D4", "#646C9A"]
            }
        }
    };
</script>
<!-- end::Global Config -->


<script src="{{ asset_url('vendors/global/vendors.bundle.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('plugins/global/plugins.bundle.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('plugins/custom/prismjs/prismjs.bundle.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('js/scripts.bundle.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('libs/jstree.bundle.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('vendors/custom/fullcalendar/fullcalendar.bundle.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('libs/jquery.fancybox.min.js', true) }}" type="text/javascript"></script>





<script src="{{ asset_url('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset_url('js/pages/crud/datatables/basic/paginations.js') }}"></script>


<script src="{{ asset_url('libs/treeview.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('libs/dropzone.js', true) }}" type="text/javascript"></script>
{{--<script src="{{ asset_url('libs/dashboard.js', true) }}" type="text/javascript"></script>--}}
<script src="{{ asset_url('js/numeral.min.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('js/print.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('js/jquery.checkboxes.js', true) }}" type="text/javascript"></script>
<script src="{{ asset_url('js/custom.js', true) }}" type="text/javascript"></script>

<script src="{{ asset_url('js/pages/crud/forms/widgets/select2.js')}}"></script>
<script src="{{ asset_url('js/pages/crud/forms/widgets/bootstrap-daterangepicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<script src="{{ asset_url('js/pages/features/charts/apexcharts.js')}}"></script>
@yield('scripts')


<script>


var loadFile = function(event) {
        var output = document.getElementById('loadfile');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }

      };


    $(document).ready(function(){
        $('.dt-table').dataTable({
         "bFilter": true,
         "ordering": false,
        });
         $(".gth-ids,.gth-grid_actions").removeClass('sorting_asc');
         $(".gth-ids,.gth-grid_actions").removeClass('sorting_desc');
         $(".gth-ids,.gth-grid_actions").removeClass('sorting');


         $('th').click(function(){
            $(".gth-ids,.gth-grid_actions").removeClass('sorting_asc');
         $(".gth-ids,.gth-grid_actions").removeClass('sorting_desc');
         $(".gth-ids,.gth-grid_actions").removeClass('sorting');
         });


        $(".rm-select2").select2('destroy');

     });
</script>
</body>
</html>
