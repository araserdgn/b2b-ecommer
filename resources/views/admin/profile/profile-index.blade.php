@extends('admin.layouts.master');

@section('title')
    Profile
@endsection


@section('contents')
              <!-- Content wrapper -->
              <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

                  <div class="row">
                    <div class="col-md-12">
                      <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                          <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages-account-settings-notifications.html"
                            ><i class="bx bx-bell me-1"></i> Notifications</a
                          >
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages-account-settings-connections.html"
                            ><i class="bx bx-link-alt me-1"></i> Connections</a
                          >
                        </li>
                      </ul>
                      <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>
                        <!-- Account -->
                        <hr class="my-0" />
                        <div class="card-body">

                            <form action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" id="formAccountSettings" method="POST" >

                                @csrf
                                <div class="card-body">
                                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img
                                      src="{{ asset('default/avatar.jpg') }}"
                                      alt="user-avatar"
                                      class="d-block rounded"
                                      height="100"
                                      width="100"
                                      id="uploadedAvatar"
                                    />
                                    <div class="button-wrapper">
                                      <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input
                                          type="file"
                                          id="upload"
                                          name="avatar"
                                          class="account-file-input"
                                          hidden
                                          accept="image/png, image/jpeg"
                                        />
                                      </label>
                                      <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                      </button>

                                      <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                  </div>
                                </div>

                            <div class="row">
                              <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Full Name</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="firstName"
                                  name="name"
                                  placeholder="{{ $user->name}}"
                                  autofocus
                                />
                              </div>

                              <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="email"
                                  name="email"
                                  value="{{$user->email}}"
                                  placeholder="example@example.com"
                                />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Tax Number</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="vergi_no"
                                  name="vergi_no"
                                  value="tax-number"
                                />
                              </div>

                              <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                  <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    class="form-control"
                                    placeholder="{{$user->phone}}"
                                  />
                                </div>
                              </div>

                              <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                  <input type="text" class="form-control" value="{{$user->address}}"  id="address" name="address" placeholder="Address" />
                              </div>

                              <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">City</label>
                                <input class="form-control" type="text" id="il" name="il" placeholder="Angara" />
                              </div>

                              <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Website</label>
                                <input class="form-control" type="text" id="website" value="{{$user->website}}" name="website"  />
                              </div>

                              <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Twitter</label>
                                <input class="form-control" type="text" id="x_link" value="{{$user->x_link}}" name="x_link"  />
                              </div>

                              <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Facebook</label>
                                <input class="form-control" type="text" id="facebook" value="{{$user->facebook}}" name="facebook"  />
                              </div>

                              <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Instagram</label>
                                <input class="form-control" type="text" id="insta" name="insta" value="{{$user->insta}}" />
                              </div>



                            </div>

                            <div class="mt-2">
                              <button type="submit" class="btn btn-primary me-2">Save changes</button>
                              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>

                          </form>
                        </div>

                        <!-- /Account -->
                      </div>

                      <div class="card mb-2">
                        <h5 class="card-header">Update Password</h5>
                        <div class="card-body">
                            <form action="{{ route('admin.profile-password.update') }}" id="formAccountSettings" method="POST" >

                                @csrf
                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">New Password</label>
                                        <input
                                          class="form-control"
                                          type="password"
                                          id="password"
                                          name="password"
                                        />
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Again New Password</label>
                                        <input
                                          class="form-control"
                                          type="password"
                                          id="password_confirmation"
                                          name="password_confirmation"
                                        />
                                    </div>

                                </div>

                            <button type="submit" class="btn btn-primary deactivate-account">Update Password</button>
                          </form>
                        </div>
                      </div>

                      <div class="card">
                        <h5 class="card-header">Delete Account</h5>
                        <div class="card-body">
                          <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                              <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                            </div>
                          </div>
                          <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                name="accountActivation"
                                id="accountActivation"
                              />
                              <label class="form-check-label" for="accountActivation"
                                >I confirm my account deactivation</label
                              >
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- / Content -->


                <div class="content-backdrop fade"></div>
              </div>
              <!-- Content wrapper -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#uploadedAvatar').attr('src', '{{ asset($user->avatar)}}')
        })
    </script>
    <script src="{{ asset('admin/assets/js/pages-account-settings-account.js') }}"></script>
@endsection
