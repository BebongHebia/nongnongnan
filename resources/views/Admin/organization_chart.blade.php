@extends('Admin.sidebar')
@section('sidebar')

<head>
    <style scoped>

.org-chart ul {
  padding-top: 20px;
  position: relative;
  transition: all 0.5s;
}

.org-chart li {
  float: left;
  text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 5px 0 5px;
  transition: all 0.5s;
}

.org-chart li::before, .org-chart li::after {
  content: '';
  position: absolute;
  top: 0;
  right: 50%;
  border-top: 2px solid #ccc;
  width: 50%;
  height: 20px;
}

.org-chart li::after {
  right: auto;
  left: 50%;
  border-left: 2px solid #ccc;
}

.org-chart li:only-child::after, .org-chart li:only-child::before {
  display: none;
}

.org-chart li:only-child {
  padding-top: 0;
}

.org-chart li:first-child::before, .org-chart li:last-child::after {
  border: 0 none;
}

.org-chart li:last-child::before {
  border-right: 2px solid #ccc;
  border-radius: 0 5px 0 0;
}

.org-chart li:first-child::after {
  border-radius: 5px 0 0 0;
}

.org-chart .node {
  display: inline-block;
  padding: 10px 20px;
  border-radius: 5px;
  background: #5a9;
  color: white;
  font-weight: bold;
  text-transform: uppercase;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  transition: background 0.3s;
}

.org-chart .node:hover {
  background: #478;
}

    </style>
</head>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Organizational Chart</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="org-chart">
            <ul>
              <li>
                <div class="node">CEO</div>
                <ul>
                  <li>
                    <div class="node">CTO</div>
                    <ul>
                      <li><div class="node">Dev Team Lead</div></li>
                      <li><div class="node">QA Team Lead</div></li>
                    </ul>
                  </li>
                  <li>
                    <div class="node">CFO</div>
                    <ul>
                      <li><div class="node">Finance Manager</div></li>
                    </ul>
                  </li>
                  <li>
                    <div class="node">COO</div>
                    <ul>
                      <li><div class="node">Operations Manager</div></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>


    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

