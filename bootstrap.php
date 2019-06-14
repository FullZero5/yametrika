<?php
namespace Flextype;

$getId = $flextype->registry->get('plugins.yametrika.YandexId'); 

$flextype->emitter->addListener('onThemeTail', function() use ($getId)  {
       echo(yaCode($getId));
});

function yaCode(int $id) : string {
    return (isset($id)) ? "
        <!-- Yandex.Metrika counter -->
        <script>
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter{$id} = new Ya.Metrika({
                            id:{$id},
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true,
                            webvisor:true
                        });
                    } catch(e) { }
                });        
                let n = d.getElementsByTagName('script')[0],
                    s = d.createElement('script'),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.async = true;
                s.src = 'https://mc.yandex.ru/metrika/watch.js';       
                if (w.opera == '[object Opera]') {
                    d.addEventListener('DOMContentLoaded', f, false);
                } else { f(); }
            })(document, window, 'yandex_metrika_callbacks');
        </script>
        <!-- /Yandex.Metrika counter -->
    " : '';
}
