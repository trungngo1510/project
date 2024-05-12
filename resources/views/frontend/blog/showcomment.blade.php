                        @foreach($comments as $r)
                        @if($r->level==0)
                        <li class="media" id="comment-{{$r->id}}">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="/public/user/avatar/{{$r->avatar}}" alt="" style="width:100px;height: 86 px; ">
                            </a>
                            <div class="media-body ">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>{{$r->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{$r->created_at->format('H:i:s')}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$r->created_at->format('d/m/Y')}}</li>
                                </ul>

                                <p id="blogcmt">{{$r->cmt}}</p>
                                <br>
                                <!-- <textarea name="message" id="cmt" class="cmt" rows="3"></textarea> -->
                                <!-- <a class="btn btn-primary creply " ><i class="fa fa-reply"></i>Replay</a> -->
                                <div class="replay-box" style="margin-bottom: 0;margin-top: 0;">
                                    <div class="blank-arrow">
                                        <input type="hidden" name="id_cmt" id="id_cmt" value="{{$r->id}}">
                                        <input type="hidden" name="id_user" id="id_user" value="{{$r->id_user}}">
                                        <input type="hidden" name="level" id="level" value="{{$r->id}}">
                                        <input type="hidden" name="id_blog" id="id_blog" value="{{$r->id_blog}}">
                                        <span>*</span>
                                        <input type="hidden" name="id_blog" value="{{$r->id_blog}}">
                                        <textarea name="message" id="body" class="cmt" rows="3" style="background-color:wheat;"></textarea>
                                        <a class="btn btn-primary post">post replay</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif


                        @foreach($dataCommentUser as $item)
                        @if($item->level==$value->id)
                        <li class="media second-media reply">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="/public/user/avatar/{{$item->avatar}}" alt="" style="width:100px;height: 86 px; ">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>{{$item->name}}</li>
                                    <li><i class="fa fa-clock-o"></i> {{$item->created_at->format('H:i:s')}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$item->created_at->format('d/m/Y')}}</li>
                                </ul>

                                <p>{{$item->cmt}}</p>
                                <a class="btn btn-primary btn-reply"><i class="fa fa-reply"></i>Replay</a>
                                <div class="formReply reply-form" style="display: none;">
                                    <input type="text" class="form-control reply-input" placeholder="Your reply...">
                                    <button class="btn btn-primary btn-submit-reply" data-id="{{$item->id}}">Submit</button>
                                </div>
                            </div>
                            </div>
                        </li>
                        @endif
                        @endforeach

                        @endforeach