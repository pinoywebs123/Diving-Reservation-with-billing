<aside>
      <div id="sidebar" class="nav-collapse ">
      
        <ul class="sidebar-menu">
          <li class="{{request()->segment(2) == 'home' ? 'active': ''}}">
            <a class="" href="{{route('admin_home')}}">
                  <i class="icon_house_alt"></i>
                  <span>Home </span>
            </a>
          </li>
          
          
          <li class="{{request()->segment(2) == 'reservation' ? 'active': ''}}">
            <a class="" href="{{route('admin_reservation')}}">
                <i class="icon_genius"></i>
                <span>Reservations</span>
            </a>
          </li>

           <li class="{{request()->segment(2) == 'equipment' ? 'active': ''}}">
            <a class="" href="{{route('admin_equipment')}}">
                <i class="icon_flowchart_alt"></i>
                <span>Equipments</span>
            </a>
          </li>

          <li class="{{request()->segment(2) == 'customer-list' ? 'active': ''}}">
            <a class="" href="{{route('admin_customer_list')}}">
                <i class="icon_profile"></i>
                <span>Customer List</span>
            </a>
          </li>

          <li class="{{request()->segment(2) == 'payment' ? 'active': ''}}">
            <a class="" href="{{route('admin_payment')}}">
                <i class="icon_currency_alt"></i>
                <span>Payment</span>
            </a>
          </li>

           <li class="{{request()->segment(2) == 'reports' ? 'active': ''}}">
            <a class="" href="{{route('admin_reports')}}">
                <i class="icon_search_alt"></i>
                <span>Report</span>
            </a>
          </li>
          
        </ul>
        
      </div>
    </aside>