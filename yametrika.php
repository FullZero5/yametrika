<?php

namespace Flextype;

use Flextype\Component\{Event\Event, Registry\Registry};


Event::addListener('onThemeFooter',function () {
    echo(yaCode(Registry::get('plugins.yametrika.id')));
});

/**
 * Return Yandex code paste in site
 *
 * @param  int    $id Yandex counter ID
 * @return string
 */
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
        
                var n = d.getElementsByTagName('script')[0],
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