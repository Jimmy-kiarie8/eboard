<template>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events page <hr>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">events page</li>
      </ol>
    </section>
    <!-- /.content -->

  <section class="content" style="background: #fff;">
    <div class="box-body">
        <add-to-calendar title=""
                       location=""
                       :start="new Date()"
                       :end="new Date((new Date).setDate((new Date).getDate() + 1))"
                       details=""
                       inline-template>
        <div>
          
          <div class="col-md-6">
            <h5>Add to Google calendar</h5> <hr>
            <google-calendar id="google-calendar">
              <i class="fa fa-google w3-button w3-white w3-border w3-round-large"></i> 
            </google-calendar>
          </div>
          <div class="col-md-6">  
            <h5>Add to Microsoft live calendar</h5><hr>
            <microsoft-calendar id="microsoft-calendar" class="col-md-6">
              <i class="fa fa-windows w3-button w3-white w3-border w3-round-large"></i> 
            </microsoft-calendar>
          </div>

        </div>
      </add-to-calendar>
    </div>

    <iframe src="https://calendar.google.com/calendar/embed?title=Eboard%20Calendar&amp;height=500&amp;wkst=1&amp;bgcolor=%23c0c0c0&amp;src=nbjj4erlesdkaajqrvv0g52ea4%40group.calendar.google.com&amp;color=%23060D5E&amp;ctz=Africa%2FNairobi" style="border:solid 1px #777" width="700" height="500" frameborder="0" scrolling="no"></iframe>
  </section>
</div>
</template>
