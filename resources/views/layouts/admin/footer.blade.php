<style>
    .float-whatsapp {
        position: fixed;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        padding: 15px;
    }

    .float-whatsapp:hover {
        background-color: #128C7E;
    }
</style>

<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="{{route('dashboard')}}">Admin Persil</a>
                        </div>
                        <div class="col-12 col-sm-5 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <img src="{{asset('asset-admin/img/logo.png')}}"  alt="Logo Admin Persil"
                            style="width: 40px; height: 40px;"> <a href="{{route('identitas')}}">Filbert Anggriawan</a>

                       </div>
                    </div>
                </div>
            </div>

<!-- Floating WhatsApp Icon -->
<a href="https://wa.me/+6281226181479" class="float-whatsapp" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
