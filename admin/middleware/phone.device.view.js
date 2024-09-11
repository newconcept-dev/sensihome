function createResponsiveView(containerId, iframeSrc) {
    // Crear el contenedor principal
    const container = document.getElementById(containerId);
    if (!container) {
      console.error(`Container with id "${containerId}" not found.`);
      return;
    }
  
    // Crear el contenido HTML
    const htmlContent = `
      
        <div class="px">
          <div class="px__body"></div>
          <div class="px__screen">
            <div class="px__screen__">
              <div class="px__screen__frame">
                <iframe id="dynamic-content-${containerId}" src="${iframeSrc}" frameborder="0"  style="width: 100%; height: 100%; border-radius: inherit; overflow: hidden;"></iframe>
              </div>
            </div>
          </div>
        </div>
      
    `;
  
    // Insertar el contenido HTML en el contenedor
    container.innerHTML = htmlContent;
  
    // Crear el contenido CSS
    const cssContent = `
      body {
        background-color: transparent;
      }
      .temp-wrapper {
        margin: 20px;
      }
      @media all and (min-width: 480px) {
        .temp-wrapper {
          width: 50%;
          margin: 20px auto;
        }
        .temp-wrapper--wide {
          width: 100%;
        }
        .temp-wrapper--wider {
          width: 100%;
        }
      }
      @media all and (min-width: 768px) {
        .temp-wrapper {
          width: 33.33337%;
        }
        .temp-wrapper--wide {
          width: 66.66667%;
        }
        .temp-wrapper--wider {
          width: 100%;
        }
      }
      @media all and (min-width: 1024px) {
        .temp-wrapper {
          width: 25%;
        }
        .temp-wrapper--wide {
          width: 50%;
        }
        .temp-wrapper--wider {
          width: 75%;
        }
      }
      .px {
        position: relative;
        padding: 6% 7%;
      }
      .px--ls {
        padding: 3.3% 3%;
      }
      .px__body {
        position: absolute;
        top: 0;
        right: 1%;
        bottom: 0;
        left: 1%;
        background: linear-gradient(to top, #e5e5e5 0%, #f7f7f9 10%, #eeeef0 90%);
        border-radius: 14%/7%;
        box-shadow: inset 0 0 3px 1px #000;
      }
      .px--ls > .px__body {
        top: 1%;
        right: 0;
        bottom: 1%;
        left: 0;
        border-radius: 7%/14%;
      }
      .px__body:before {
        content: '';
        position: absolute;
        top: 0.7%;
        right: 1.4%;
        bottom: 0.7%;
        left: 1.4%;
        background-color: #000;
        border-radius: 13%/7%;
        box-shadow: 0 0 3px #000;
      }
      .px--ls > .px__body:before {
        top: 1.4%;
        right: 0.7%;
        bottom: 1.4%;
        left: 0.7%;
        border-radius: 7%/13%;
      }
      .px__body:after {
        content: '';
        position: absolute;
        top: 1%;
        right: 2.3%;
        bottom: 1%;
        left: 2.3%;
        background-color: #000;
        box-shadow: inset 0 0 10px 2px #fff;
        border-radius: 13%/6.5%;
      }
      .px--ls > .px__body:after {
        top: 2.3%;
        right: 1%;
        bottom: 2.3%;
        left: 1%;
        border-radius: 6.5%/13%;
      }
      .px__screen {
        position: relative;
        z-index: 1;
      }
      .px__screen__ {
        position: relative;
        padding-bottom: 218%;
        background-color: #888;
        border-radius: 10%/5%;
        box-shadow: 0 0 10px #000;
      }
      .px--ls .px__screen__ {
        padding-bottom: 46%;
        border-radius: 5%/10%;
      }
      .px__screen__frame {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow: hidden;
        border-radius: inherit;
        background-size: cover;
        background-position: center center;
      }
      .px__screen__frame > .fa {
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 5em;
        transform: translate(-50%, -50%);
      }
      #dynamic-content-${containerId} {
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: #fff;
        border-radius: inherit;
      }

      
    `;
  
    // Insertar el contenido CSS en el documento
    const style = document.createElement('style');
    style.innerHTML = cssContent;
    document.head.appendChild(style);
  }