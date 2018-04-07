<!-- <template>
<nav class="w3-sidebar w3-collapse w3-black w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/storage/img/team/team1.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
    <router-link to="/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye"></i>&nbsp; Overview</router-link>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>&nbsp; Views</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; Traffic</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>&nbsp; Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp; Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>&nbsp; News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>&nbsp; General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>&nbsp; History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a><br><br>
  </div>
</nav>

</template>

<script>
export default {
  props: []: ['username']
}
style="position: relative; overflow: hidden; width: auto; height: 302px;"
</script> -->
<template>
  <div>
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Eboard</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i data-layout="fixed" class="fa fa-dashboard"></i>
              <span class="label label-danger">Navfix</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{user.name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{user.name}}
                  <small>{{user.credentials}}</small>
                </p>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{user.name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <router-link to="/" class=""><i class="fa fa-dashboard"></i>&nbsp;
            <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">welcome</small> -->
            </span>
          </router-link>
        </li>

        <li class="treeview">
          <router-link to="/director" class=""><i class="fa fa-user"></i>&nbsp; 
            <span>Directors</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </router-link>
        </li>

        <li class="treeview">
          <router-link to="/shareholder" class=""><i class="fa fa-circle-o"></i>&nbsp; <span>Shareholders</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </router-link>
        </li>
        <li>
          <router-link to="/manage" class=""><i class="fa fa-th"></i>&nbsp;
            <span>Manage company</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">welcome</small> -->
            </span>
          </router-link>
        </li>
        <li class="treeview">
          <router-link to="#" class=""><i class="fa angle-left"></i>&nbsp;
            <span>Document Categories</span>
            <span class="pull-right-container"></span>
              <!-- <small class="label pull-right bg-green">welcome</small> -->
          </router-link>
          <ul class="treeview-menu">
            <li><router-link to="/catshow"><i class="fa angle-left"></i>
              <span>Show categories</span>
            </router-link></li>
            <li><router-link to="/category"><i class="fa angle-left"></i>
              <span>Add and edit</span>
            </router-link></li>
          </ul>
        </li>
        <li class="treeview">
          <router-link to="/cal" class=""><i class="fa angle-left"></i>&nbsp;
            <span>Meeting Calendar</span>
            <span class="pull-right-container"></span>
              <!-- <small class="label pull-right bg-green">welcome</small> -->
          </router-link>
          <ul class="treeview-menu">
            <li><router-link to="/agm"><i class="fa angle-left"></i>
              <span>Anual general meeting</span>
            </router-link></li>
            <li><router-link to="/board"><i class="fa angle-left"></i>
              <span>Board meeting</span>
            </router-link></li>
            <li><router-link to="/sam"><i class="fa angle-left"></i>
              <span>Special anual meeting</span>
            </router-link></li>
            <li><router-link to="/committee"><i class="fa angle-left"></i>
              <span>Committee meeting</span>
            </router-link></li>
            <li><router-link to="/event"><i class="fa angle-left"></i>
              <span>Upcoming events</span>
            </router-link></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</div>
</template>

<script>
export default {
  props: ['user']
}
</script>