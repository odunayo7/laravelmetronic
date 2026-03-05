# Motion.dev Animation Rules

These rules dictate how page components within the application should be animated using the `motion` library (https://motion.dev/).

## Global Animation Requirements

1. **Page Transitions & Initialization:** All main page components, distinct blocks of content, and lists must animate into view when the page loads or when the component is dynamically rendered.
2. **Library to Use:** We explicitly use `motion` (formerly Framer Motion) for Vanilla JS/HTML.
3. **Trigger:** Animations should typically trigger using the `inView` helper to ensure elements only animate when they enter the user's viewport.

## Common Animation Patterns

### 1. Fade-in and Slide-up Integration
The standard entrance for page cards, widgets, and lists is a subtle slide up with a fade-in.
```javascript
<script src="https://cdn.jsdelivr.net/npm/motion@11.11.13/dist/motion.js"></script>
<script>
  Motion.inView(".motion-slide-up", (info) => {
      Motion.animate(info.target, { opacity: [0, 1], y: [20, 0] }, { duration: 0.5, easing: "ease-out" });
  });
</script>
```

### 2. Staggered Lists
When displaying lists of items (e.g., data tables, list widgets), animate children with a staggered delay for a cascading effect.
```javascript
<script src="https://cdn.jsdelivr.net/npm/motion@11.11.13/dist/motion.js"></script>
<script>
  Motion.inView(".motion-stagger-list", (info) => {
      Motion.animate(
          ".motion-stagger-item",
          { opacity: [0, 1], x: [-10, 0] },
          { delay: Motion.stagger(0.1), duration: 0.4 }
      );
  });
</script>
```

### 3. Interactive Elements
Buttons and interactive cards should have subtle hover/tap scaling using Motion if not already handled comprehensively by Metronic's CSS classes.

## Implementation Steps for New Components

Whenever a new Blade component or page is created:
1. **Identify Triggers:** Identify the primary structural elements (containers, headers, content blocks).
2. **Add Motion Classes:** Add a descriptive class (e.g., `.motion-slide-up`, `.motion-fade-in`) to these elements.
3. **Initialize Animation:** Ensure these elements are targeted by our global Motion initialization script, or instantiate the animation within the component's specific JS block.
4. **Snappy Feel:** Keep durations short (0.3s - 0.5s) to ensure the UI feels snappy and responsive. Do not make the user wait for an animation to finish to read critical content.
5. **Reduced Motion:** Always respect accessibility guidelines. Check for `@media (prefers-reduced-motion)` preferences gracefully if generating advanced sequences.
