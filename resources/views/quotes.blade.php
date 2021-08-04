@extends('layout.main')
@section('content')
    <section class="old-quotes-main">
      <div class="container">
        <section class="old-quotes-inner table-responsive">
          <h1>User old Quotes</h1>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>item</th>
                <th>description</th>
                <th>price</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pl-4">
                  <img
                    src="images/u-old-quotes-img.png"
                    alt="Product"
                    class="img-fluid"
                  />
                </td>
                <td>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt
                </td>
                <td class="text-center">$123</td>
                <td class="text-center">
                  <button
                    class="btn"
                    type="button"
                    data-toggle="modal"
                    data-target="#estimate-modal"
                  >
                    <img class="img-fluis" src="images/file-icon.png" alt="" />
                  </button>
                  <button class="btn p-0" type="button">
                    <img class="img-fluis" src="images/del-icon.png" alt="" />
                  </button>
                </td>
              </tr>
              <tr>
                <td class="pl-4">
                  <img
                    src="images/u-old-quotes-img.png"
                    alt="Product"
                    class="img-fluid"
                  />
                </td>
                <td>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt
                </td>
                <td class="text-center">$123</td>
                <td class="text-center">
                  <button class="btn" type="button">
                    <img class="img-fluis" src="images/file-icon.png" alt="" />
                  </button>
                  <button class="btn p-0" type="button">
                    <img class="img-fluis" src="images/del-icon.png" alt="" />
                  </button>
                </td>
              </tr>
              <tr>
                <td class="pl-4">
                  <img
                    src="images/u-old-quotes-img.png"
                    alt="Product"
                    class="img-fluid"
                  />
                </td>
                <td>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt
                </td>
                <td class="text-center">$123</td>
                <td class="text-center">
                  <button class="btn" type="button">
                    <img class="img-fluis" src="images/file-icon.png" alt="" />
                  </button>
                  <button class="btn p-0" type="button">
                    <img class="img-fluis" src="images/del-icon.png" alt="" />
                  </button>
                </td>
              </tr>
              <tr>
                <td class="pl-4">
                  <img
                    src="images/u-old-quotes-img.png"
                    alt="Product"
                    class="img-fluid"
                  />
                </td>
                <td>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt
                </td>
                <td class="text-center">$123</td>
                <td class="text-center">
                  <button class="btn" type="button">
                    <img class="img-fluis" src="images/file-icon.png" alt="" />
                  </button>
                  <button class="btn p-0" type="button">
                    <img class="img-fluis" src="images/del-icon.png" alt="" />
                  </button>
                </td>
              </tr>
              <tr>
                <td class="pl-4">
                  <img
                    src="images/u-old-quotes-img.png"
                    alt="Product"
                    class="img-fluid"
                  />
                </td>
                <td>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt
                </td>
                <td class="text-center">$123</td>
                <td class="text-center">
                  <button class="btn" type="button">
                    <img class="img-fluis" src="images/file-icon.png" alt="" />
                  </button>
                  <button class="btn p-0" type="button">
                    <img class="img-fluis" src="images/del-icon.png" alt="" />
                  </button>
                </td>
              </tr>
              <tr>
                <td class="pl-4">
                  <img
                    src="images/u-old-quotes-img.png"
                    alt="Product"
                    class="img-fluid"
                  />
                </td>
                <td>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt
                </td>
                <td class="text-center">$123</td>
                <td class="text-center">
                  <button class="btn" type="button">
                    <img class="img-fluis" src="images/file-icon.png" alt="" />
                  </button>
                  <button class="btn p-0" type="button">
                    <img class="img-fluis" src="images/del-icon.png" alt="" />
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </section>
        <!-- Estimate modal html start here -->
        <!-- The Modal -->
        <div class="modal fade" id="estimate-modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Estimate Summary</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span> &times;</span>
                </button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <p class="modal-top-para">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco
                  laboris nisi ut aliquip.
                </p>
                <p class="total-estimate text__color-black">
                  Total Estimate: $195.00 to $215.25
                </p>
                <p class="modal-top-para pt-4">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="madal-img-main">
                  <div class="model-bottom-box">
                    <div class="model-bottom-img">
                      <img
                        src="images/modal-b-img.png"
                        alt="u-old-quotes-img"
                      />
                    </div>
                    <p class="">Sub-Total: $135.00 to $155.25</p>
                    <p class="pt-0 md-mb-3">Premium Edge: Tempo</p>
                  </div>
                  <div class="model-bottom-box">
                    <div class="model-bottom-img">
                      <img
                        src="images/modal-b-img.png"
                        alt="u-old-quotes-img"
                      />
                    </div>
                    <p>Color: Brazilian Brown Granite</p>
                    <p class="pt-0 md-mb-3">[6222-58]</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Estimate modal html end here -->
      </div>
    </section>
@endsection    