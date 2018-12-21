# Eats Theme

A test theme created using the create-10up theme scaffolding tool. Follows
standards outlined in the tool.

## Header

Features a header with logo homepage link, search dropdown and a collapsing main
navigation for mobile.

## Templates

For the sake of this project, only an index.php blog roll, search page, and
singular.php templates are being used. More variations could easily be added in.

## A11y

WCAG 2.1 compliant. Makes use of landmark elements like `<nav>`, and `<main>`
for quick and easy navigation through out the pages. One thing that was not
clear in the designs is where the `<h1>` would be coming from, so for now it is
somewhat up in the air. On the homepage, the `Eats` text is being used as the h1
however this is not really a decent solution. Keyboard interactions around the
menus follow proper use of focus management when opening and closing dropdowns.

## Performance

Critical render path could be tweaked more for better first paint performance
as well as Time To Interactive, but all in all it is reasonably good. Animations
and scroll all are using high frame rate methods, to ensure there is no jank
in the animations.
