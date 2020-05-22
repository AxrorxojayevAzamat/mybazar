
    document.addEventListener(
        "DOMContentLoaded", () => {
            const menu = new Mmenu( "#menu" );
            const api = menu.API;

            // new mhead( "#menu-header", {
            //     scroll: {
            //         pin: 100
            //     }
            // });

            document.querySelector( "#close-menu-btn" ).addEventListener("click", ( evnt ) => {
                    evnt.preventDefault();
                    api.close();
                }
            );

            
        }
    );