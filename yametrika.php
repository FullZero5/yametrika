<?php

namespace Flextype;

/**
 *
 * Flextype Yandex Metrika Plugin
 *
 * @author Fullzero5 <fullzero5@gmail.com>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flextype\Component\{Event\Event, Registry\Registry};

Event::addListener('onThemeFooter',function () {
    echo(yaCode(Registry::get('plugins.yametrika.id')));
});

/**
 * Return Yandex Metrika code paste in site
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
