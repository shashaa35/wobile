
<style>
.r1{
	width:30%;
	margin-left: 50%;
}
.#myModal{
	width:30%;
	padding: 10px;
}
  .input-field input[type=text].invalid {
     border-bottom: 1px solid #000;
     box-shadow: 0 1px 0 0 #000;
   }
.panel-info {
    border-color: #bce8f1;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid #bce8f1;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-info>.panel-heading {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
</style>
  <div class="container">
    <div style="margin-top:50px"class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div ng-show="showing" class="panel panel-info">
          <div class="panel-heading">
           <div class="panel-title">Log In</div>
           <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
          </div>
          <div  class="panel-body">
          <form>
          <div style="margin-bottom: 25px" class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" type="text" class="form-control" name="username" value="" placeholder="username">
          </div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" value="" placeholder="password">
          </div>

          <button type="button" onclick="start()" class="btn btn-success">LOGIN &nbsp;</button>
          </form>
          <div class="col-md-12 control">
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
            Don't have an account! 
            <a style="cursor:pointer;text-decoration:none;" ng-click="show()">
            Sign Up Here
            </a>
            </div>
          </div>
          </div>
        </div>
           <div ng-hide="showing" class="panel panel-info">
          <div class="panel-heading">
           <div class="panel-title">Sign up</div>
          </div>
          <div  class="panel-body">
          <form>
          <div style="margin-bottom: 25px" class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="uname" type="text" class="form-control" name="userFirstName" value="" placeholder="username">
          </div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password1" type="password" class="form-control" name="password" value="" placeholder="password">
          </div>
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
           <input id="email1" type="email" class="form-control" name="userEmail" placeholder="email"/>
            </div>
          <button type="button" onclick="signu()" class="btn btn-primary">Signup&nbsp;</button>
          </form>
          <div class="col-md-12 control">
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
            Already Signup! 
             <a style="cursor:pointer;text-decoration:none;" ng-click="show()">
            Login Here
            </a>
            </div>
          </div>
          </div>
        </div>
    </div>
      </div>
    </div>
  </div>


