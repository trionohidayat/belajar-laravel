<!DOCTYPE html>
<html lang="en">
@include('components.header')

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>403</h1>
            <div class="page-description">
            	You do not have access to this page.
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="/dashboard">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Stisla 2018
        </div>
      </div>
    </section>
  </div>

  
  @include('components.script')
</body>
</html>