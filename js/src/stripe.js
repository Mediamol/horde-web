/**
 * Javascript code for finding all tables with classname "striped" and
 * dynamically striping their row colors.
 *
 * $Horde: hordeweb/js/src/stripe.js,v 1.2 2009/12/18 17:54:00 slusarz Exp $
 *
 * @author Chuck Hagenbuch <chuck@horde.org>
 * @author Matt Warden <mwarden@gmail.com>
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 */

window.Horde = window.Horde || {};

Horde.stripeAllElements = function()
{
    $$('.striped').each(this.stripeElement);
};

Horde.stripeElement = function(elt)
{
    var classes = [ 'rowEven', 'rowOdd' ],
        e = $(elt).childElements();

    if (elt.tagName == 'TABLE') {
        // Tables can have more than one tbody element; get all child
        // tbody tags and interate through them.
        e.each(Horde.stripeElement.bind(Horde));
    } else {
        // Toggle the classname of any child node that is an element.
        e.each(function(c) {
            c.removeClassName(classes[1]).addClassName(classes[0]);
            classes.reverse(true);
        });
    }
};

/* We have to wait for the full DOM to be loaded to ensure we don't
 * miss anything. */
document.observe('dom:loaded', Horde.stripeAllElements.bind(Horde));
