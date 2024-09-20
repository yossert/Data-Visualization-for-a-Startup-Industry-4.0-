<!-- start footer-->
<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2023 || Designed By 4IOT ||<a href="#login" data-toggle="modal" data-target="#adminLoginModalCenter"> Admin Login</a></small>
    </footer>
    <!-- end footer-->

    <!-- start registration model-->    
        <!-- Modal -->
        <div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stuRegModalCenterLabel">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- start registration form-->
                <?php include('visitorRegistration.php');?>
                <!-- end registration form-->
            </div>
            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="button" class="btn btn-primary" style="background-color: #97062a; border-color: #97062a " onclick="addStu()" id="signup">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    <!-- end registration model-->

    
    <!-- start login model-->    
        <!-- Modal -->
        <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stuLoginModalCenterLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- start login form-->
                <form id="stuLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="stuLogemail" class="pl-2 font-weight-bold" >Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="stuLogpass" class="pl-2 font-weight-bold" >Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
                    </div>
                </form>
                <!-- end login form-->
            </div>
            <div class="modal-footer">
            <span id="statusLogMsg"></span>
                <button type="button" class="btn btn-primary"style="background-color: #97062a; border-color: #97062a " id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
        </div>
    <!-- end login model-->



    <!-- start admin login model-->    
        <!-- Modal -->
        <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- start admin login form-->
                <form id="adminLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="adminLogemail" class="pl-2 font-weight-bold" >Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="adminLogpass" class="pl-2 font-weight-bold" >Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
                    </div>
                </form>
                <!-- end admin login form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" style="background-color: #97062a; border-color: #97062a " id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
        </div>
    <!-- end admin login model-->










<!-- jquery and bootstrap js-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- font awesome js-->
<script src="js/all.min.js"></script>

<!-- visitor ajax call js-->
<script type="text/javascript" src="js/ajaxrequest.js"></script>

<!-- admin ajax call js-->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>


<!--testimonial owl slider js -->
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>

</body>

</html>