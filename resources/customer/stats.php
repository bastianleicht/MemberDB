<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */

$currPage = 'back_Member';
include 'app/controller/PageController.php';

$id = $helper->protect($_GET['id']);


$SQL = $db->prepare("SELECT * FROM `member` WHERE `id` = :id");
$SQL->execute(array(":id" => $id));
$member_data = $SQL->fetch(PDO::FETCH_ASSOC);

?>
<script src="https://kit.fontawesome.com/e924d8dfd3.js"></script>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?= $helper->url(); ?>"><?= $helper->siteName(); ?></a></li>
                        <li class="breadcrumb-item active"><?= $currPageName; ?></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <form method="post">
                        <button type="submit" name="deleteMember" class="btn btn-primary float-sm-right">Member Bearbeiten</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="<?= $helper->picUrl() ?>faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3"/>
                                <div class="mb-3">
                                    <h3>David Grey. H</h3>
                                </div>
                                <p class="w-75 mx-auto mb-3">Bureau Oberhaeuser is a design bureau focused on Information- and Interface Design. </p>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success mr-1">Hire Me</button>
                                    <button class="btn btn-success">Follow</button>
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <p>Skills</p>
                                <div>
                                    <label class="badge badge-outline-dark">Chalk</label>
                                    <label class="badge badge-outline-dark">Hand lettering</label>
                                    <label class="badge badge-outline-dark">Information Design</label>
                                    <label class="badge badge-outline-dark">Graphic Design</label>
                                    <label class="badge badge-outline-dark">Web Design</label>
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="d-flex mb-3">
                                    <div class="progress progress-md flex-grow">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="progress progress-md flex-grow">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
                                    <span class="float-right text-muted">
                            Active
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            Phone
                          </span>
                                    <span class="float-right text-muted">
                            006 3435 22
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            Mail
                          </span>
                                    <span class="float-right text-muted">
                            Jacod@testmail.com
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            Facebook
                          </span>
                                    <span class="float-right text-muted">
                            <a href="#">David Grey</a>
                          </span>
                                </p>
                                <p class="clearfix">
                          <span class="float-left">
                            Twitter
                          </span>
                                    <span class="float-right text-muted">
                            <a href="#">@davidgrey</a>
                          </span>
                                </p>
                            </div>
                            <button class="btn btn-primary btn-block mb-2">Preview</button>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button class="btn btn-outline-primary">Message</button>
                                    <button class="btn btn-primary">Request</button>
                                </div>
                            </div>
                            <div class="mt-4 py-2 border-top border-bottom">
                                <ul class="nav profile-navbar">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="mdi mdi-account-outline"></i>
                                            Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">
                                            <i class="mdi mdi-newspaper"></i>
                                            Feed
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="mdi mdi-calendar"></i>
                                            Agenda
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="mdi mdi-attachment"></i>
                                            Resume
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <img src="<?= $helper->picUrl() ?>faces/face13.jpg" alt="profile" class="img-sm rounded-circle"/>
                                    <div class="ml-4">
                                        <h6>
                                            Mason Beck
                                            <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                                        </h6>
                                        <p>
                                            There is no better advertisement campaign that is low cost and also successful at the same time.
                                        </p>
                                        <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="mdi mdi-star mr-1"></i>4
                              </span>
                                            <span class="ml-2">
                                <i class="mdi mdi-comment mr-1"></i>11
                              </span>
                                            <span class="ml-2">
                                <i class="mdi mdi-reply"></i>
                              </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start profile-feed-item">
                                    <img src="<?= $helper->picUrl() ?>faces/face16.jpg" alt="profile" class="img-sm rounded-circle"/>
                                    <div class="ml-4">
                                        <h6>
                                            Willie Stanley
                                            <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                                        </h6>
                                        <img src="<?= $helper->picUrl() ?>samples/1280x768/12.jpg" alt="sample" class="rounded mw-100"/>
                                        <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="mdi mdi-star mr-1"></i>4
                              </span>
                                            <span class="ml-2">
                                <i class="mdi mdi-comment mr-1"></i>11
                              </span>
                                            <span class="ml-2">
                                <i class="mdi mdi-reply"></i>
                              </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start profile-feed-item">
                                    <img src="<?= $helper->picUrl() ?>faces/face19.jpg" alt="profile" class="img-sm rounded-circle"/>
                                    <div class="ml-4">
                                        <h6>
                                            Dylan Silva
                                            <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                                        </h6>
                                        <p>
                                            When I first got into the online advertising business, I was looking for the magical combination
                                            that would put my website into the top search engine rankings
                                        </p>
                                        <img src="<?= $helper->picUrl() ?>samples/1280x768/5.jpg" alt="sample" class="rounded mw-100"/>
                                        <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="mdi mdi-star mr-1"></i>4
                              </span>
                                            <span class="ml-2">
                                <i class="mdi mdi-comment mr-1"></i>11
                              </span>
                                            <span class="ml-2">
                                <i class="mdi mdi-reply"></i>
                              </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>