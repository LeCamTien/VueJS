@extends('layouts.master')
    @section('content')
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Grid Options - based on Bootstrap Grid system overview</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a>Layout</a>
                    </li>
                    <li class="active">
                        <strong>Grid Opons</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Grid options</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                Extra small devices
                                                <small>Phones (&lt;768px)</small>
                                            </th>
                                            <th>
                                                Small devices
                                                <small>Tablets (&ge;768px)</small>
                                            </th>
                                            <th>
                                                Medium devices
                                                <small>Desktops (&ge;992px)</small>
                                            </th>
                                            <th>
                                                Large devices
                                                <small>Desktops (&ge;1200px)</small>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Grid behavior</th>
                                            <td>Horizontal at all times</td>
                                            <td colspan="3">Collapsed to start, horizontal above breakpoints</td>
                                        </tr>
                                        <tr>
                                            <th>Max container width</th>
                                            <td>None (auto)</td>
                                            <td>750px</td>
                                            <td>970px</td>
                                            <td>1170px</td>
                                        </tr>
                                        <tr>
                                            <th>Class prefix</th>
                                            <td>
                                                <code>.col-xs-</code>
                                            </td>
                                            <td>
                                                <code>.col-sm-</code>
                                            </td>
                                            <td>
                                                <code>.col-md-</code>
                                            </td>
                                            <td>
                                                <code>.col-lg-</code>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th># of columns</th>
                                            <td colspan="4">12</td>
                                        </tr>
                                        <tr>
                                            <th>Max column width</th>
                                            <td class="text-muted">Auto</td>
                                            <td>60px</td>
                                            <td>78px</td>
                                            <td>95px</td>
                                        </tr>
                                        <tr>
                                            <th>Gutter width</th>
                                            <td colspan="4">30px (15px on each side of a column)</td>
                                        </tr>
                                        <tr>
                                            <th>Nestable</th>
                                            <td colspan="4">Yes</td>
                                        </tr>
                                        <tr>
                                            <th>Offsets</th>
                                            <td colspan="4">Yes</td>
                                        </tr>
                                        <tr>
                                            <th>Column ordering</th>
                                            <td colspan="4">Yes</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, applying any
                                <code>.col-md-</code> class to an element will not only affect its styling on medium devices but also on large devices if a
                                <code>.col-lg-</code> class is not present.</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    @stop 
            