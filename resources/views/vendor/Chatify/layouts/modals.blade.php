{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
  </div>

  {{-- ---------------------- Delete Modal ---------------------- --}}
  <div class="app-modal" data-name="delete">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="delete" data-modal='0'>
              <div class="app-modal-header">Are you sure you want to delete this?</div>
              <div class="app-modal-body">You can not undo this action</div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                  <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Delete</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Manuals Modal ---------------------- --}}
  <div class="app-modal" data-name="manuals">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="manuals" data-modal='0'>
              <div class="app-modal-header">Manuals on how to make chatBuntu like an app</div>
              <div class="app-modal-body">How to install chatBuntu as an web app on iOS:<br /> <a href="https://allthings.how/how-to-install-or-save-any-website-as-an-app-on-iphone-using-safari/" target="_blank" style="color:red">iOs manual</a><br /><br />
                How to turn any website into a custom Chrome OS app:<br /> <a href="https://www.computerworld.com/article/3308496/custom-chrome-os-app.html" target="_blank" style="color:red">Chrome OS app manual</a><br /><br />
                3 Ways to Turn Any Website Into an Android App:<br /> <a href="https://beebom.com/ways-turn-any-website-android-app/" target="_blank" style="color:red">Chrome OS app manual</a><br /><br />
              </div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Logout Modal ---------------------- --}}
  <div class="app-modal" data-name="logout">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="logout" data-modal='0'>
              <div class="app-modal-header">Are you sure you want to log-out?</div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                  <form class="logoutForma" style="padding: 0px!important;margin: 0px!important;" method="POST" action="{{ route('logout') }}">
                         @csrf
                    <a:href="route('logout')" class="app-btn a-btn-danger delete"
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      Logout
                      </a>
                  </form>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Alert Modal ---------------------- --}}
  <div class="app-modal" data-name="alert">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="alert" data-modal='0'>
              <div class="app-modal-header"></div>
              <div class="app-modal-body"></div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Settings Modal ---------------------- --}}
  <div class="app-modal" data-name="settings">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="settings" data-modal='0'>
              <form id="update-settings" action="{{ route('avatar.update') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  {{-- <div class="app-modal-header">Update your profile settings</div> --}}
                  <div class="app-modal-body">
                      {{-- Udate profile avatar --}}
                      <div class="avatar av-l upload-avatar-preview chatify-d-flex"
                      style="background-image: url('{{ Chatify::getUserWithAvatar(Auth::user())->avatar }}');"
                      ></div>
                      <p class="upload-avatar-details"></p>
                      <label class="app-btn a-btn-primary update" style="background-color:{{$messengerColor}}">
                          Upload New
                          <input class="upload-avatar chatify-d-none" accept="image/*" name="avatar" type="file" />
                      </label>
                      {{-- Dark/Light Mode  --}}
                      <p class="divider"></p>
                      <p class="app-modal-header">Dark Mode <span class="
                        {{ Auth::user()->dark_mode > 0 ? 'fas' : 'far' }} fa-moon dark-mode-switch"
                         data-mode="{{ Auth::user()->dark_mode > 0 ? 1 : 0 }}"></span></p>
                      {{-- change messenger color  --}}
                      <p class="divider"></p>
                      {{-- <p class="app-modal-header">Change {{ config('chatify.name') }} Color</p> --}}
                      <div class="update-messengerColor">
                      @foreach (config('chatify.colors') as $color)
                        <span style="background-color: {{ $color}}" data-color="{{$color}}" class="color-btn"></span>
                        @if (($loop->index + 1) % 5 == 0)
                            <br/>
                        @endif
                      @endforeach
                      </div>
                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                      <input type="submit" class="app-btn a-btn-success update" value="Save Changes" />
                  </div>
              </form>
          </div>
      </div>
  </div>
