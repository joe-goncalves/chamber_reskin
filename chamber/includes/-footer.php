        </div>
    </div>
</div>
    <!-- /#wrapper -->
</body>
</html>
<div id="footer" class='container-fluid'>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h2>The Chamber of Commerce of the Greater Ronkonkomas</h2>
            <div class="row">
                <div class="col-xs-4 col-sm-4">
                    Contact Us: PO Box 2546
                </div>
                <div class="col-xs-8 col-sm-8">
                    p: 631-963-2796
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4">
                    Ronkonkoma, NY 11779
                </div>
                <div class="col-xs-8 col-sm-8">
                    e:  <a class="foot_links" href="mailto:info@ronkonkomachamber.com">info@ronkonkomachamber.com</a>
                </div>
            </div>
        </div>
        <div class = "col-md-4 col-sm-12">
            <h2>join our mailing list</h2>
            <form method="post" target="_blank" id='ccoptin' action="http://visitor.constantcontact.com/d.jsp" name="ccoptin">
                Email:
                <div class = "input-group input-group-sm">
                    <input type="text" value="" size="26" name="ea" class = "form-control">
                    <span class="input-group-btn">
                        <input id = "cc_email_join" type="submit" class="submit btn btn-default" value="Join" name="go">
                    </span>
                </div>
                <input type="hidden" value="1102554981432" name="m">
                <input type="hidden" value="oi" name="p">
            </form>   
        </div>         
        <div class = "col-md-2 col-sm-12">
            <a style="color:#fff" href="http://www.facebook.com/pages/Ronkonkoma-Chamber-of-Commerce/193799817361633">
                <img style="margin-right:5px" alt="FB" src="http://www.ronkonkomachamber.com/images/fb.png">stay connected
            </a>
        </div>
    </div>
</div>
<!--script src="<=$local_url>/js/jquery-1.11.0.js"></script-->
<script src="<?=$local_url?>/js/bootstrap.min.js"></script>
<script src="<?=$local_url?>/js/-bootstrap-list-filter.src.js"></script>
<script>
    $(document).ready(function(){


        /*  member by category page  */
        $('[data-catid]').click(function(e){
            e.preventDefault();
        })
        $('.list-group-item.first').click(function(){ /*  include a catch to close open lists on click of open list header  */
           $('[data-membercatid]').parent().addClass('hidden');
           var curval = $(this).children('a').attr("data-catid");
           $('[data-membercatid='+curval+']').parent().removeClass('hidden');
        });


    });
</script>

