# TJAR Authentication - Visual Design Guide

## 📐 Screen Layouts & Components

### 1️⃣ Login Screen Layout
```
┌─────────────────────────────────────────────────────┐
│                 DESKTOP VIEW (1024px+)              │
├──────────────────────┬──────────────────────────────┤
│                      │   TJAR Logo (Top Center)     │
│   Marketing         │   "تسجيل الدخول"            │
│   Section           │   Instructions               │
│   (Left 50%)        │                              │
│                      │   Phone Input                │
│   • Gradient BG     │   [+966] [05xxxxxxxx]        │
│   • Man w/ Laptop   │                              │
│   • Text & CTA      │   Password Input             │
│                      │   [••••••••] [👁️]           │
│                      │                              │
│                      │   Remember Me ☐             │
│   "في جار" Button  │   [Login Button] ►           │
│                      │                              │
│                      │   Create Account Link       │
├──────────────────────┴──────────────────────────────┤
│              MOBILE VIEW (< 768px)                   │
│  Full Width Single Column                          │
│  Logo at top, form below                           │
└─────────────────────────────────────────────────────┘
```

### 2️⃣ Registration Screen Layout
```
Same as Login but with:
- Full Name input
- Phone input
- City dropdown
- Password input
- Confirm Password input
- Terms agreement checkbox (ready)
```

### 3️⃣ OTP Verification Layout
```
┌──────────────────────────────────┐
│   TJAR Logo                      │
│   "رمز التحقق"                  │
│   Message: "تم الإرسال إلى..."  │
│                                  │
│   [_] [_] [_] [_] [_]           │
│    5-digit Code Boxes            │
│   (Auto-advance on input)        │
│                                  │
│   Timer: 1:59                    │
│                                  │
│   [Confirm Code Button]          │
│                                  │
│   Resend? (Disabled, enabled @0) │
│   Change Number                  │
└──────────────────────────────────┘
```

---

## 🎨 Color Palette

### Primary Colors
```
Teal:       #17a2b8  RGB(23, 162, 184)
Teal Dark:  #117a8b  RGB(17, 122, 139)
Emerald:    #10b981  RGB(16, 185, 129)
Emerald DK: #059669  RGB(5, 150, 105)
```

### Supporting Colors
```
White:      #ffffff
Gray-50:    #f9fafb  (Light backgrounds)
Gray-100:   #f3f4f6  (Input backgrounds)
Gray-200:   #e5e7eb  (Borders)
Gray-300:   #d1d5db  (Dividers)
Gray-400:   #9ca3af  (Placeholders)
Gray-500:   #6b7280  (Secondary text)
Gray-600:   #4b5563  (Text)
Gray-700:   #374151  (Text)
Gray-800:   #1f2937  (Dark text)

Red-500:    #ef4444  (Errors)
Red-600:    #dc2626  (Error hover)
Green-500:  #22c55e  (Success)
Green-600:  #16a34a  (Success hover)
```

---

## 📏 Typography System

### Font Family
```
Primary: Tajawal (Arabic)
Fallback: -apple-system, BlinkMacSystemFont, 'Segoe UI'
```

### Font Sizes & Weights
```
Page Title:
  Size: 2rem (32px)
  Weight: 700 (bold)
  Use: Page headers

Section Title:
  Size: 1.5rem (24px)
  Weight: 700 (bold)
  Use: Form titles

Label:
  Size: 0.875rem (14px)
  Weight: 600 (semibold)
  Use: Form labels

Body:
  Size: 1rem (16px)
  Weight: 400 (regular)
  Use: Paragraphs, help text

Small:
  Size: 0.875rem (14px)
  Weight: 400 (regular)
  Use: Instructions, secondary info

Link:
  Size: 0.875rem (14px)
  Weight: 600 (semibold)
  Color: Teal
  Hover: Teal Dark
```

---

## 🔘 Component Specifications

### Input Fields
```
Height: 44px (mobile friendly)
Padding: 12px horizontal, 10px vertical
Border: 1px solid #d1d5db
Border-radius: 8px
Font-size: 16px (prevents zoom on iOS)
Focus state: 2px ring, teal color

Structure:
┌─────────────────────────────────┐
│ [+966] 05xxxxxxxx               │
├─────────────────────────────────┤
│ Left: Country code or label     │
│ Center: Input field             │
│ Right: Icon or toggle           │
└─────────────────────────────────┘
```

### Buttons
```
Primary Button:
  Background: Teal → Emerald gradient
  Color: White
  Padding: 12px 16px
  Border-radius: 8px
  Font-weight: 700
  Min-height: 48px
  Hover: Darker gradient
  Active: Slight scale down
  
  States:
  Normal:   Gradient (teal → emerald)
  Hover:    Darker gradient + shadow
  Active:   Scale down 2px
  Disabled: Gray background, cursor not-allowed
```

### OTP Input Boxes
```
Width: 48px
Height: 48px
Border: 2px solid #d1d5db
Border-radius: 8px
Font-size: 24px
Font-weight: 700
Text-align: center
Display: Flex items center justify center

Focus state:
  Border: 2px solid #17a2b8
  Box-shadow: 0 0 0 3px rgba(23, 162, 184, 0.1)
```

### Checkboxes
```
Size: 16x16px
Accent color: Teal
Border: 1px solid #d1d5db
Border-radius: 4px
Checked: Teal background
```

### Dropdown/Select
```
Height: 44px
Padding: 12px 16px
Border: 1px solid #d1d5db
Border-radius: 8px
Background: White
Arrow: Right-aligned
Appearance: None (custom styled)
```

---

## 📐 Spacing System

### Vertical Spacing
```
xs: 8px   (0.5rem)
sm: 12px  (0.75rem)
md: 16px  (1rem)
lg: 24px  (1.5rem)
xl: 32px  (2rem)
2xl: 48px (3rem)
```

### Horizontal Padding
```
Mobile:  16px (1rem)
Tablet:  24px (1.5rem)
Desktop: 32px (2rem)
```

### Component Gaps
```
Form spacing:     16px (1rem)
Group spacing:    20px (1.25rem)
Section spacing:  32px (2rem)
Container padding: 32px (2rem)
```

---

## 🌐 Responsive Breakpoints

### Mobile First Approach
```
Mobile:   0px - 767px    (1 column)
Tablet:   768px - 1023px (1-2 columns, flexible)
Desktop:  1024px+        (2 columns, side-by-side)
```

### Layout Changes
```
Mobile (< 768px):
├─ Single column layout
├─ Full width inputs
├─ Bottom navigation
├─ Stacked sections
└─ 16px padding

Tablet (768px - 1023px):
├─ Can show 2 columns
├─ Adaptive spacing
├─ Side navigation
└─ Flexible layout

Desktop (1024px+):
├─ Two-column layout
├─ Left: Marketing (50%)
├─ Right: Form (50%)
├─ Larger fonts
└─ Enhanced spacing
```

---

## ✨ Animations & Transitions

### Timing
```
Fast:      0.15s
Normal:    0.3s
Slow:      0.5s
Timing fn: ease-out or ease-in-out
```

### Animations

**Page Load:**
```css
@keyframes slideInUp {
  from: { opacity: 0; transform: translateY(20px); }
  to:   { opacity: 1; transform: translateY(0); }
}
Duration: 0.5s ease-out
```

**Header Load:**
```css
@keyframes slideInDown {
  from: { opacity: 0; transform: translateY(-20px); }
  to:   { opacity: 1; transform: translateY(0); }
}
Duration: 0.5s ease-out
```

**Button Hover:**
```
Transform: translateY(-2px)
Box-shadow: 0 10px 20px rgba(23, 162, 184, 0.2)
Transition: 0.3s ease
```

**Input Focus:**
```
Ring: 0 0 0 3px rgba(23, 162, 184, 0.1)
Border: 2px solid teal
Transition: 0.2s ease
```

**Spinner:**
```css
@keyframes spin {
  to: { transform: rotate(360deg); }
}
Duration: 0.8s linear infinite
```

---

## 🖼️ Image Specifications

### Logo
```
File: TJAR-LOGO-V1-01 1.svg
Size: 80x80px (in page)
Format: SVG (scalable)
Used: Header of all pages
```

### Marketing Image
```
File: Frame 1597883802.png
Size: 500x600px (max)
Format: PNG (high quality)
Used: Left section of login/register
Alt: Man with laptop
```

### Alternative Assets
```
Path8.png: 120x50px alternative logo
Ellipse images: Decorative backgrounds
Other icons: Available for enhancement
```

---

## 🎯 States & Feedback

### Form States

**Normal State:**
```
Border: 1px solid gray-200
Background: white
Text color: gray-900
```

**Focus State:**
```
Border: 2px solid teal
Ring: 3px teal with 10% opacity
Box-shadow: subtle
```

**Error State:**
```
Border: 2px solid red-500
Background: white
Error text: red-500 color
Error icon: ⚠️ symbol
```

**Success State:**
```
Border: 2px solid green-600
Background: green-50
Success text: green-700
Success icon: ✓ symbol
```

**Disabled State:**
```
Background: gray-100
Cursor: not-allowed
Opacity: 0.6
Border: 1px gray-300
```

---

## 📱 Touch Interactions

### Input Touch Targets
```
Minimum size: 44x44px
Padding: 12px minimum
Spacing: 8px between elements
```

### Button Touch Targets
```
Minimum height: 48px
Minimum width: 44px
Padding: 12px 24px
Spacing between: 16px
```

### Clickable Areas
```
Links: 44px min height
Icons: 24x24px min size
Adjacent spacing: 8px
```

---

## ♿ Accessibility

### Color Contrast
```
Text on background: 4.5:1 minimum
Large text: 3:1 minimum
Graphical elements: 3:1 minimum
```

### Focus Indicators
```
Visible: Yes, always
Color: Teal (high contrast)
Width: 2px ring
Offset: 2-4px from element
```

### ARIA Labels
```
<label for="email">
  <span class="required">*</span> رقم الجوال
</label>
<input id="email" type="email" aria-required="true">
```

### Keyboard Navigation
```
Tab order: Top to bottom
Skip links: Available
Focus visible: Always shown
```

---

## 🌙 Dark Mode Ready

Current implementation: Light theme
Future enhancement: Dark mode variants

Color adjustments needed:
```
Background: #1f2937 (gray-800)
Text: #f3f4f6 (gray-100)
Inputs: #374151 (gray-700)
Borders: #4b5563 (gray-600)
```

---

## 📊 Performance Targets

### Load Time
```
First Contentful Paint (FCP): < 1.5s
Largest Contentful Paint (LCP): < 2.5s
Cumulative Layout Shift (CLS): < 0.1
Time to Interactive (TTI): < 3.5s
```

### File Sizes
```
CSS: < 50kb (gzipped)
JavaScript: < 30kb (gzipped)
Images: < 200kb total
HTML: < 30kb (gzipped)
```

### Optimization
```
✓ CSS minified
✓ Images optimized
✓ Lazy loading ready
✓ Font optimization needed
✓ Caching configured
```

---

## 🔐 Security Visual Indicators

### Password Strength
```
Weak:     Red indicator
Fair:     Orange indicator
Good:     Yellow indicator
Strong:   Green indicator
Very Strong: Teal indicator
```

### Validation Indicators
```
Valid:    Green border + ✓
Invalid:  Red border + ⚠️
Warning:  Orange border + !
Info:     Blue border + ℹ️
```

---

## 📸 Screenshot Dimensions

### Desktop
```
1920x1080 - Full HD
1440x900  - Common
1024x768  - Min desktop
```

### Tablet
```
768x1024  - iPad portrait
1024x768  - iPad landscape
820x1180  - iPad Mini
```

### Mobile
```
375x812   - iPhone 11 Pro
375x667   - iPhone SE
414x896   - iPhone 11
360x800   - Android standard
```

---

## ✅ Design QA Checklist

- [ ] All colors match specification
- [ ] Typography is consistent
- [ ] Spacing follows grid system
- [ ] Components are properly aligned
- [ ] Focus states are visible
- [ ] Error states are clear
- [ ] Loading states show progress
- [ ] Images are optimized
- [ ] Animations are smooth
- [ ] Responsive design works
- [ ] RTL layout is correct
- [ ] Accessibility standards met
- [ ] Performance targets met
- [ ] All interactive elements work

---

**Last Updated:** January 3, 2026
**Version:** 1.0 Design System
