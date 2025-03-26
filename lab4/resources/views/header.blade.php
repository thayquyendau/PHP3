 <!-- Navigation Bar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
     <div class="container-fluid">
         <a class="navbar-brand" href="{{ route('tin.moi')}}">News</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item">
                     <a class="nav-link active" href="{{ route('tin.moi')}}">Trang chủ</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                         data-bs-toggle="dropdown" aria-expanded="false">
                         Loại tin
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         @foreach ($loai as $tin)
                             <li><a class="dropdown-item"
                                     href="{{ route('cat.id', $tin->idLoai) }}">Loai:{{ $tin->idLoai }}</a></li>
                         @endforeach
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Liên hệ</a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
