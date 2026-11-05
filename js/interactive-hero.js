/**
 * Interactive Portfolio Hero Animation Controller
 * Adapted for A.A. Fazal Muhammad with Sri Tech-Style SVG Character Engine
 *
 * Implements 3 horizontal zones on desktop:
 * - Left: Smooth head look left + "Anyone here on the left?" + 2.5s hold + return
 * - Right: Smooth head look right + "Anyone here on the right?" + 2.5s hold + return
 * - Center: Greeting Sequence: Look forward alertly -> Headset drops to neck -> Wave hello -> Point downward
 *
 * Driven by requestAnimationFrame with interpolation (LERP) for high performance.
 */

(function () {
  'use strict';

  function initInteractiveHero() {
    const heroSection = document.getElementById('hero-section');
    if (!heroSection) return;

    // SVG Character Elements
    const headGroup = document.getElementById('char-head-group');
    const eyesGroup = document.getElementById('char-eyes-mouth');
    const pupilLeft = document.getElementById('pupil-left');
    const pupilRight = document.getElementById('pupil-right');
    const mouth = document.getElementById('char-mouth');
    const headset = document.getElementById('char-headset');
    const leftArmPath = document.getElementById('left-arm-path');
    const rightArmPath = document.getElementById('right-arm-path');
    const rightHand = document.getElementById('right-hand');

    // Speech Pill elements
    const speechContainer = document.getElementById('speech-pill-container');
    const speechText = document.getElementById('speech-pill-text');
    const speechDot = document.getElementById('speech-indicator-dot');

    // Desktop interaction zones
    const zoneLeft = document.getElementById('zone-left');
    const zoneCenter = document.getElementById('zone-center');
    const zoneRight = document.getElementById('zone-right');

    if (!headGroup || !rightArmPath || !rightHand) return;

    // States: 'idle', 'left', 'right', 'center_greet'
    let currentState = 'idle';
    let holdTimeout = null;
    let centerTimer = null;
    let waveStartTime = 0;

    // Animation targets & current values (LERP)
    const anim = {
      headRotation: 0,
      targetHeadRotation: 0,
      headTranslateX: 0,
      targetHeadTranslateX: 0,
      headTranslateY: 0,
      targetHeadTranslateY: 0,

      pupilOffsetX: 0,
      targetPupilOffsetX: 0,
      pupilOffsetY: 0,
      targetPupilOffsetY: 0,

      // Headset on neck offset
      headsetTranslateY: 0,
      targetHeadsetTranslateY: 0,
      headsetScale: 1,
      targetHeadsetScale: 1,

      // Right arm: 0 = Typing, 1 = Waving hello, 2 = Pointing down
      armPose: 0,
      targetArmPose: 0,

      // Mouth shape factor (0 = neutral/working, 1 = wide smile)
      mouthSmile: 0,
      targetMouthSmile: 0
    };

    // Helper: Linear Interpolation
    function lerp(start, end, factor) {
      return start + (end - start) * factor;
    }

    // Set contextual speech text with smooth fade
    function updateSpeech(text, visible, dotColor) {
      if (!speechContainer || !speechText) return;
      if (!visible) {
        speechContainer.style.opacity = '0';
        speechContainer.style.transform = 'translateY(8px)';
        return;
      }
      speechText.textContent = text;
      if (speechDot && dotColor) speechDot.style.backgroundColor = dotColor;
      speechContainer.style.opacity = '1';
      speechContainer.style.transform = 'translateY(0px)';
    }

    // --- State Transitions ---

    function returnToIdle() {
      currentState = 'idle';
      anim.targetHeadRotation = 0;
      anim.targetHeadTranslateX = 0;
      anim.targetHeadTranslateY = 0;
      anim.targetPupilOffsetX = 0;
      anim.targetPupilOffsetY = 0;
      anim.targetHeadsetTranslateY = 0;
      anim.targetHeadsetScale = 1;
      anim.targetArmPose = 0;
      anim.targetMouthSmile = 0;
      updateSpeech('', false);
    }

    function triggerLeftReaction() {
      if (currentState === 'left') return;
      if (holdTimeout) clearTimeout(holdTimeout);
      if (centerTimer) clearTimeout(centerTimer);

      currentState = 'left';
      updateSpeech("Anyone here on the left?", true, "#8c2d46");

      // Character looks left
      anim.targetHeadRotation = -8;
      anim.targetHeadTranslateX = -10;
      anim.targetHeadTranslateY = -2;
      anim.targetPupilOffsetX = -3.5;
      anim.targetPupilOffsetY = -0.5;
      anim.targetHeadsetTranslateY = 0;
      anim.targetHeadsetScale = 1;
      anim.targetArmPose = 0;
      anim.targetMouthSmile = 0.2;

      // Hold reaction for 2.5 seconds, then return to normal working state
      holdTimeout = setTimeout(() => {
        returnToIdle();
      }, 2500);
    }

    function triggerRightReaction() {
      if (currentState === 'right') return;
      if (holdTimeout) clearTimeout(holdTimeout);
      if (centerTimer) clearTimeout(centerTimer);

      currentState = 'right';
      updateSpeech("Anyone here on the right?", true, "#8c2d46");

      // Character looks right
      anim.targetHeadRotation = 8;
      anim.targetHeadTranslateX = 10;
      anim.targetHeadTranslateY = -2;
      anim.targetPupilOffsetX = 3.5;
      anim.targetPupilOffsetY = -0.5;
      anim.targetHeadsetTranslateY = 0;
      anim.targetHeadsetScale = 1;
      anim.targetArmPose = 0;
      anim.targetMouthSmile = 0.2;

      // Hold reaction for 2.5 seconds, then return to normal working state
      holdTimeout = setTimeout(() => {
        returnToIdle();
      }, 2500);
    }

    function triggerCenterGreeting() {
      if (currentState === 'center_greet') return;
      if (holdTimeout) clearTimeout(holdTimeout);
      if (centerTimer) clearTimeout(centerTimer);

      currentState = 'center_greet';

      // Step 1: Look directly at visitor, alert & excited
      anim.targetHeadRotation = 0;
      anim.targetHeadTranslateX = 0;
      anim.targetHeadTranslateY = -6; // lifts head attentively
      anim.targetPupilOffsetX = 0;
      anim.targetPupilOffsetY = 0.5;
      anim.targetMouthSmile = 0.5;
      updateSpeech("Hey, it's you!", true, "#c5617a");

      // Step 2: Remove complete headset, place it around neck (after 600ms)
      centerTimer = setTimeout(() => {
        if (currentState !== 'center_greet') return;
        anim.targetHeadsetTranslateY = 72; // drops down to rest neatly on collar/neck
        anim.targetHeadsetScale = 1.08;

        // Step 3: Wave hello! (after another 500ms)
        centerTimer = setTimeout(() => {
          if (currentState !== 'center_greet') return;
          anim.targetArmPose = 1; // waving mode
          anim.targetMouthSmile = 1.0;
          waveStartTime = performance.now();
          updateSpeech("Hiiii!", true, "#8c2d46");

          // Step 4: Point downward toward portfolio (after 1800ms of waving)
          centerTimer = setTimeout(() => {
            if (currentState !== 'center_greet') return;
            anim.targetArmPose = 2; // pointing downward mode
            anim.targetHeadTranslateY = 0;
            anim.targetPupilOffsetY = 3.0; // looking down at pointer
            updateSpeech("Check out the portfolio", true, "#4a1523");

            // Hold downward greeting for 3.2 seconds, then relax back to working
            holdTimeout = setTimeout(() => {
              returnToIdle();
            }, 3200);

          }, 1800);
        }, 500);
      }, 600);
    }

    // --- Interaction Zone Listeners (Desktop) ---
    if (zoneLeft) {
      zoneLeft.addEventListener('mouseenter', triggerLeftReaction);
    }

    if (zoneRight) {
      zoneRight.addEventListener('mouseenter', triggerRightReaction);
    }

    if (zoneCenter) {
      zoneCenter.addEventListener('mouseenter', triggerCenterGreeting);
    }

    // Mobile & Tablet: Tap on canvas or section triggers friendly center greeting
    heroSection.addEventListener('click', (e) => {
      if (window.innerWidth < 768) {
        triggerCenterGreeting();
      }
    });

    heroSection.addEventListener('touchend', (e) => {
      triggerCenterGreeting();
    }, { passive: true });

    // --- Core Animation Loop with requestAnimationFrame ---
    function renderLoop(time) {
      const ease = 0.085;
      anim.headRotation = lerp(anim.headRotation, anim.targetHeadRotation, ease);
      anim.headTranslateX = lerp(anim.headTranslateX, anim.targetHeadTranslateX, ease);
      anim.headTranslateY = lerp(anim.headTranslateY, anim.targetHeadTranslateY, ease);
      anim.pupilOffsetX = lerp(anim.pupilOffsetX, anim.targetPupilOffsetX, ease);
      anim.pupilOffsetY = lerp(anim.pupilOffsetY, anim.targetPupilOffsetY, ease);
      anim.headsetTranslateY = lerp(anim.headsetTranslateY, anim.targetHeadsetTranslateY, 0.07);
      anim.headsetScale = lerp(anim.headsetScale, anim.targetHeadsetScale, 0.07);
      anim.armPose = lerp(anim.armPose, anim.targetArmPose, 0.09);
      anim.mouthSmile = lerp(anim.mouthSmile, anim.targetMouthSmile, ease);

      // Subtle breathing idle sway when in normal typing state
      let breathSway = 0;
      if (currentState === 'idle') {
        breathSway = Math.sin(time * 0.002) * 1.5;
      }

      // Apply Head transform
      if (headGroup) {
        headGroup.setAttribute(
          'transform',
          `translate(${anim.headTranslateX}, ${anim.headTranslateY + breathSway}) rotate(${anim.headRotation} 250 245)`
        );
      }

      // Apply Pupils transform (if present)
      if (pupilLeft) {
        pupilLeft.setAttribute('cx', 228 + anim.pupilOffsetX);
        pupilLeft.setAttribute('cy', 235 + anim.pupilOffsetY);
      }
      if (pupilRight) {
        pupilRight.setAttribute('cx', 272 + anim.pupilOffsetX);
        pupilRight.setAttribute('cy', 235 + anim.pupilOffsetY);
      }

      // Apply Headset transform (moves down to neck during greeting)
      if (headset) {
        headset.setAttribute(
          'transform',
          `translate(0, ${anim.headsetTranslateY}) scale(${anim.headsetScale})`
        );
      }

      // Apply Dynamic Mouth smile shape (if present)
      if (mouth) {
        const smileDepth = 272 + (anim.mouthSmile * 6);
        const smileWidth = 242 - (anim.mouthSmile * 4);
        const smileRight = 258 + (anim.mouthSmile * 4);
        mouth.setAttribute('d', `M${smileWidth} 271 Q250 ${smileDepth} ${smileRight} 271`);
      }

      // ARM ANIMATION BLENDING
      // Pose 0: Normal Typing
      // Pose 1: Waving Hello
      // Pose 2: Pointing Downward
      if (rightArmPath && rightHand) {
        if (anim.armPose < 0.5) {
          // Typing subtle keyboard motion
          const typeFlick = (currentState === 'idle') ? Math.sin(time * 0.012) * 2 : 0;
          rightArmPath.setAttribute('d', `M330 380 Q305 ${410 + typeFlick} 280 ${425 + typeFlick}`);
          rightHand.setAttribute('transform', `translate(275, ${422 + typeFlick})`);
        } else if (anim.armPose >= 0.5 && anim.armPose < 1.5) {
          // Waving hand
          const waveProgress = (time - waveStartTime) * 0.008;
          const waveAngle = Math.sin(waveProgress * 3.5) * 18; // oscillating wave
          
          // Arm lifted upwards
          rightArmPath.setAttribute('d', 'M330 375 Q360 310 350 250');
          // Hand waving back and forth
          rightHand.setAttribute('transform', `translate(350, 245) rotate(${waveAngle} 0 0)`);
        } else {
          // Pointing downward towards portfolio
          rightArmPath.setAttribute('d', 'M330 375 Q340 430 320 480');
          rightHand.setAttribute('transform', 'translate(320, 485) rotate(45 0 0)');
        }
      }

      requestAnimationFrame(renderLoop);
    }

    // Start requestAnimationFrame loop
    requestAnimationFrame(renderLoop);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initInteractiveHero);
  } else {
    initInteractiveHero();
  }
})();
