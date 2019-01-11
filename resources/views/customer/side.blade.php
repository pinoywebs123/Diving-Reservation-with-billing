<aside>
      <div id="sidebar" class="nav-collapse ">
      
        <ul class="sidebar-menu">
          <li class="{{request()->segment(2) == 'home' ? 'active':''}}">
            <a class="" href="{{route('customer_home')}}">
                  <i class="icon_house_alt"></i>
                  <span>Home</span>
            </a>
          </li>

            <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Reservation</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('customer_reservation')}}">Reseve Now</a></li>
              <li><a class="" href="{{route('customer_reservation_history')}}">History</a></li>
            </ul>
          </li>

          <li class="sub-menu ">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Equipments</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('customer_equipment_list')}}">List</a></li>
              <li><a class="" href="{{route('customer_equipment_history')}}">History</a></li>
            </ul>
          </li>

        
          
        
          
        </ul>
        
      </div>
    </aside>