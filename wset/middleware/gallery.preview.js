(function() {
    var filterData, filterTpl, galleryData, galleryTpl;
  
    filterTpl = {
      '<>': 'button',
      'class': 'button light-blue${checked} waves-effect waves-light btn hvr-shrink',
      'data-filter': '${filter}',
      'html': '${name}'
    };
  
    filterData = [
      {
        'checked': ' is-checked',
        'filter': '*',
        'name': 'show all'
      },
      {
        'checked': '',
        'filter': '.development',
        'name': 'Development'
      },
      {
        'checked': '',
        'filter': '.design',
        'name': 'Design'
      },
      {
        'checked': '',
        'filter': '.jquery',
        'name': 'Jquery'
      },
      {
        'checked': '',
        'filter': '.isotope',
        'name': 'Isotope'
      }
    ];
  
    galleryTpl = {
      '<>': 'div',
      'class': 'element-item ${category}',
      'html': [
        {
          '<>': 'img',
          'class': 'materialboxed hvr-shrink',
          'width': '250',
          'height': '150',
          'src': '${img}',
          'data-caption': '${caption}',
          'html': ''
        }
      ]
    };
  
    galleryData = [
      {
        'category': 'development',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'design',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'jquery',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'isotope',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'development',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'design',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'jquery',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'isotope',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'development',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'design',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'jquery',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'isotope',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'development',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'design',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'jquery',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      },
      {
        'category': 'isotope',
        'img': 'http://www.placehold.it/600x400',
        'caption': 'Add caption here'
      }
    ];
  
    $('#filters').jsonRender(filterData, filterTpl);
  
    $('#grid').jsonRender(galleryData, galleryTpl);
  
    $(document).ready(function() {
      var $grid;
      $('.materialboxed').materialbox();
      $grid = $('.grid').isotope({
        itemSelector: '.element-item',
        layoutMode: 'fitRows'
      });
      $('#filters').on('click', 'button', function() {
        var filterValue;
        filterValue = $(this).attr('data-filter');
        $grid.isotope({
          filter: filterValue
        });
      });
      $('.button-group').each(function(i, buttonGroup) {
        var $buttonGroup;
        $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function() {
          $buttonGroup.find('.is-checked').removeClass('is-checked');
          $(this).addClass('is-checked');
        });
      });
      $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
          $('.scrolltop:hidden').stop(true, true).fadeIn();
        } else {
          $('.scrolltop').stop(true, true).fadeOut();
        }
      });
      $(function() {
        $('.scroll').click(function() {
          $('html,body').animate({
            scrollTop: $('#gallery').offset().top
          }, '1000');
          return false;
        });
      });
    });
  
  }).call(this);
  
  //# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBLFVBQUEsRUFBQSxTQUFBLEVBQUEsV0FBQSxFQUFBOztFQUFBLFNBQUEsR0FDRTtJQUFBLElBQUEsRUFBTSxRQUFOO0lBQ0EsT0FBQSxFQUFTLHFFQURUO0lBRUEsYUFBQSxFQUFlLFdBRmY7SUFHQSxNQUFBLEVBQVE7RUFIUjs7RUFJRixVQUFBLEdBQWE7SUFDWDtNQUNFLFNBQUEsRUFBVyxhQURiO01BRUUsUUFBQSxFQUFVLEdBRlo7TUFHRSxNQUFBLEVBQVE7SUFIVixDQURXO0lBTVg7TUFDRSxTQUFBLEVBQVcsRUFEYjtNQUVFLFFBQUEsRUFBVSxjQUZaO01BR0UsTUFBQSxFQUFRO0lBSFYsQ0FOVztJQVdYO01BQ0UsU0FBQSxFQUFXLEVBRGI7TUFFRSxRQUFBLEVBQVUsU0FGWjtNQUdFLE1BQUEsRUFBUTtJQUhWLENBWFc7SUFnQlg7TUFDRSxTQUFBLEVBQVcsRUFEYjtNQUVFLFFBQUEsRUFBVSxTQUZaO01BR0UsTUFBQSxFQUFRO0lBSFYsQ0FoQlc7SUFxQlg7TUFDRSxTQUFBLEVBQVcsRUFEYjtNQUVFLFFBQUEsRUFBVSxVQUZaO01BR0UsTUFBQSxFQUFRO0lBSFYsQ0FyQlc7OztFQTJCYixVQUFBLEdBQ0U7SUFBQSxJQUFBLEVBQU0sS0FBTjtJQUNBLE9BQUEsRUFBUywwQkFEVDtJQUVBLE1BQUEsRUFBUTtNQUFFO1FBQ1IsSUFBQSxFQUFNLEtBREU7UUFFUixPQUFBLEVBQVMsMEJBRkQ7UUFHUixPQUFBLEVBQVMsS0FIRDtRQUlSLFFBQUEsRUFBVSxLQUpGO1FBS1IsS0FBQSxFQUFPLFFBTEM7UUFNUixjQUFBLEVBQWdCLFlBTlI7UUFPUixNQUFBLEVBQVE7TUFQQSxDQUFGOztFQUZSOztFQVdGLFdBQUEsR0FBYztJQUNaO01BQ0UsVUFBQSxFQUFZLGFBRGQ7TUFFRSxLQUFBLEVBQU8saUNBRlQ7TUFHRSxT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QXpCLEVBQW1DLFFBQUEsQ0FBQSxDQUFBO1FBQ2pDLFlBQVksQ0FBQyxJQUFiLENBQWtCLGFBQWxCLENBQWdDLENBQUMsV0FBakMsQ0FBNkMsWUFBN0M7UUFDQSxDQUFBLENBQUUsSUFBRixDQUFPLENBQUMsUUFBUixDQUFpQixZQUFqQjtNQUZpQyxDQUFuQztJQUZzQixDQUF4QjtJQU9BLENBQUEsQ0FBRSxNQUFGLENBQVMsQ0FBQyxNQUFWLENBQWlCLFFBQUEsQ0FBQSxDQUFBO01BQ2YsSUFBRyxDQUFBLENBQUUsSUFBRixDQUFPLENBQUMsU0FBUixDQUFBLENBQUEsR0FBc0IsRUFBekI7UUFDRSxDQUFBLENBQUUsbUJBQUYsQ0FBc0IsQ0FBQyxJQUF2QixDQUE0QixJQUE1QixFQUFrQyxJQUFsQyxDQUF1QyxDQUFDLE1BQXhDLENBQUEsRUFERjtPQUFBLE1BQUE7UUFHRSxDQUFBLENBQUUsWUFBRixDQUFlLENBQUMsSUFBaEIsQ0FBcUIsSUFBckIsRUFBMkIsSUFBM0IsQ0FBZ0MsQ0FBQyxPQUFqQyxDQUFBLEVBSEY7O0lBRGUsQ0FBakI7SUFNQSxDQUFBLENBQUUsUUFBQSxDQUFBLENBQUE7TUFDQSxDQUFBLENBQUUsU0FBRixDQUFZLENBQUMsS0FBYixDQUFtQixRQUFBLENBQUEsQ0FBQTtRQUNqQixDQUFBLENBQUUsV0FBRixDQUFjLENBQUMsT0FBZixDQUF1QjtVQUFFLFNBQUEsRUFBVyxDQUFBLENBQUUsVUFBRixDQUFhLENBQUMsTUFBZCxDQUFBLENBQXNCLENBQUM7UUFBcEMsQ0FBdkIsRUFBa0UsTUFBbEU7ZUFDQTtNQUZpQixDQUFuQjtJQURBLENBQUY7RUF0QmdCLENBQWxCO0FBaElBIiwic291cmNlc0NvbnRlbnQiOlsiZmlsdGVyVHBsID0gXG4gICc8Pic6ICdidXR0b24nXG4gICdjbGFzcyc6ICdidXR0b24gbGlnaHQtYmx1ZSR7Y2hlY2tlZH0gd2F2ZXMtZWZmZWN0IHdhdmVzLWxpZ2h0IGJ0biBodnItc2hyaW5rJ1xuICAnZGF0YS1maWx0ZXInOiAnJHtmaWx0ZXJ9J1xuICAnaHRtbCc6ICcke25hbWV9J1xuZmlsdGVyRGF0YSA9IFtcbiAge1xuICAgICdjaGVja2VkJzogJyBpcy1jaGVja2VkJ1xuICAgICdmaWx0ZXInOiAnKidcbiAgICAnbmFtZSc6ICdzaG93IGFsbCdcbiAgfVxuICB7XG4gICAgJ2NoZWNrZWQnOiAnJ1xuICAgICdmaWx0ZXInOiAnLmRldmVsb3BtZW50J1xuICAgICduYW1lJzogJ0RldmVsb3BtZW50J1xuICB9XG4gIHtcbiAgICAnY2hlY2tlZCc6ICcnXG4gICAgJ2ZpbHRlcic6ICcuZGVzaWduJ1xuICAgICduYW1lJzogJ0Rlc2lnbidcbiAgfVxuICB7XG4gICAgJ2NoZWNrZWQnOiAnJ1xuICAgICdmaWx0ZXInOiAnLmpxdWVyeSdcbiAgICAnbmFtZSc6ICdKcXVlcnknXG4gIH1cbiAge1xuICAgICdjaGVja2VkJzogJydcbiAgICAnZmlsdGVyJzogJy5pc290b3BlJ1xuICAgICduYW1lJzogJ0lzb3RvcGUnXG4gIH1cbl1cbmdhbGxlcnlUcGwgPSBcbiAgJzw+JzogJ2RpdidcbiAgJ2NsYXNzJzogJ2VsZW1lbnQtaXRlbSAke2NhdGVnb3J5fSdcbiAgJ2h0bWwnOiBbIHtcbiAgICAnPD4nOiAnaW1nJ1xuICAgICdjbGFzcyc6ICdtYXRlcmlhbGJveGVkIGh2ci1zaHJpbmsnXG4gICAgJ3dpZHRoJzogJzI1MCdcbiAgICAnaGVpZ2h0JzogJzE1MCdcbiAgICAnc3JjJzogJyR7aW1nfSdcbiAgICAnZGF0YS1jYXB0aW9uJzogJyR7Y2FwdGlvbn0nXG4gICAgJ2h0bWwnOiAnJ1xuICB9IF1cbmdhbGxlcnlEYXRhID0gW1xuICB7XG4gICAgJ2NhdGVnb3J5JzogJ2RldmVsb3BtZW50J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnZGVzaWduJ1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnanF1ZXJ5J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnaXNvdG9wZSdcbiAgICAnaW1nJzogJ2h0dHA6Ly93d3cucGxhY2Vob2xkLml0LzYwMHg0MDAnXG4gICAgJ2NhcHRpb24nOiAnQWRkIGNhcHRpb24gaGVyZSdcbiAgfVxuICB7XG4gICAgJ2NhdGVnb3J5JzogJ2RldmVsb3BtZW50J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnZGVzaWduJ1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnanF1ZXJ5J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnaXNvdG9wZSdcbiAgICAnaW1nJzogJ2h0dHA6Ly93d3cucGxhY2Vob2xkLml0LzYwMHg0MDAnXG4gICAgJ2NhcHRpb24nOiAnQWRkIGNhcHRpb24gaGVyZSdcbiAgfVxuICB7XG4gICAgJ2NhdGVnb3J5JzogJ2RldmVsb3BtZW50J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnZGVzaWduJ1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnanF1ZXJ5J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnaXNvdG9wZSdcbiAgICAnaW1nJzogJ2h0dHA6Ly93d3cucGxhY2Vob2xkLml0LzYwMHg0MDAnXG4gICAgJ2NhcHRpb24nOiAnQWRkIGNhcHRpb24gaGVyZSdcbiAgfVxuICB7XG4gICAgJ2NhdGVnb3J5JzogJ2RldmVsb3BtZW50J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnZGVzaWduJ1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnanF1ZXJ5J1xuICAgICdpbWcnOiAnaHR0cDovL3d3dy5wbGFjZWhvbGQuaXQvNjAweDQwMCdcbiAgICAnY2FwdGlvbic6ICdBZGQgY2FwdGlvbiBoZXJlJ1xuICB9XG4gIHtcbiAgICAnY2F0ZWdvcnknOiAnaXNvdG9wZSdcbiAgICAnaW1nJzogJ2h0dHA6Ly93d3cucGxhY2Vob2xkLml0LzYwMHg0MDAnXG4gICAgJ2NhcHRpb24nOiAnQWRkIGNhcHRpb24gaGVyZSdcbiAgfVxuXVxuJCgnI2ZpbHRlcnMnKS5qc29uUmVuZGVyIGZpbHRlckRhdGEsIGZpbHRlclRwbFxuJCgnI2dyaWQnKS5qc29uUmVuZGVyIGdhbGxlcnlEYXRhLCBnYWxsZXJ5VHBsXG4kKGRvY3VtZW50KS5yZWFkeSAtPlxuICAkKCcubWF0ZXJpYWxib3hlZCcpLm1hdGVyaWFsYm94KClcbiAgJGdyaWQgPSAkKCcuZ3JpZCcpLmlzb3RvcGUoXG4gICAgaXRlbVNlbGVjdG9yOiAnLmVsZW1lbnQtaXRlbSdcbiAgICBsYXlvdXRNb2RlOiAnZml0Um93cycpXG4gICQoJyNmaWx0ZXJzJykub24gJ2NsaWNrJywgJ2J1dHRvbicsIC0+XG4gICAgZmlsdGVyVmFsdWUgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtZmlsdGVyJylcbiAgICAkZ3JpZC5pc290b3BlIGZpbHRlcjogZmlsdGVyVmFsdWVcbiAgICByZXR1cm5cbiAgJCgnLmJ1dHRvbi1ncm91cCcpLmVhY2ggKGksIGJ1dHRvbkdyb3VwKSAtPlxuICAgICRidXR0b25Hcm91cCA9ICQoYnV0dG9uR3JvdXApXG4gICAgJGJ1dHRvbkdyb3VwLm9uICdjbGljaycsICdidXR0b24nLCAtPlxuICAgICAgJGJ1dHRvbkdyb3VwLmZpbmQoJy5pcy1jaGVja2VkJykucmVtb3ZlQ2xhc3MgJ2lzLWNoZWNrZWQnXG4gICAgICAkKHRoaXMpLmFkZENsYXNzICdpcy1jaGVja2VkJ1xuICAgICAgcmV0dXJuXG4gICAgcmV0dXJuXG4gICQod2luZG93KS5zY3JvbGwgLT5cbiAgICBpZiAkKHRoaXMpLnNjcm9sbFRvcCgpID4gNTBcbiAgICAgICQoJy5zY3JvbGx0b3A6aGlkZGVuJykuc3RvcCh0cnVlLCB0cnVlKS5mYWRlSW4oKVxuICAgIGVsc2VcbiAgICAgICQoJy5zY3JvbGx0b3AnKS5zdG9wKHRydWUsIHRydWUpLmZhZGVPdXQoKVxuICAgIHJldHVyblxuICAkIC0+XG4gICAgJCgnLnNjcm9sbCcpLmNsaWNrIC0+XG4gICAgICAkKCdodG1sLGJvZHknKS5hbmltYXRlIHsgc2Nyb2xsVG9wOiAkKCcjZ2FsbGVyeScpLm9mZnNldCgpLnRvcCB9LCAnMTAwMCdcbiAgICAgIGZhbHNlXG4gICAgcmV0dXJuXG4gIHJldHVybiJdfQ==
  //# sourceURL=coffeescript