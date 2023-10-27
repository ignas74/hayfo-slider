/**
 * @package HayfoSlider
 */

/**
 * @value frames.value - from @namespace HayfoSlider\Base\EnqueueScripts;
 * This value is set in Admin panel and later global get_option() was used.
 * console.log(frames.value)
 */

'use strict'

// console.log('check:' + items.screen)

// Set slider's frames from Admin panel to CSS
// document.addEventListener('DOMContentLoaded', () => {
//     const slider = document.querySelector('.slider')
//     slider.style.setProperty('--items-per-screen', items.screen) 
// })

document.addEventListener('click', e => {
    // Fix for .text usage inside the button .handle
    let handle
    
    if (e.target.matches('.hfo-handle')) {
        handle = e.target
    } else {
        handle = e.target.closest('.hfo-handle')
    }
    
    if (handle != null) {
        onHandleClick(handle)
    }
})

function onHandleClick(handle) {
    const slider = handle.closest('.hfo-container').querySelector('.hfo-slider')
    const sliderIndex = parseInt(getComputedStyle(slider).getPropertyValue('--slider-index'))
    const itemsPerScreen = parseInt(getComputedStyle(slider).getPropertyValue('--items-per-screen'))

    // console.log(`Items per screen from function: ${itemsPerScreen}`)

    const maxIndex = Math.ceil(slider.childElementCount / itemsPerScreen) - 1

    let newIndex

    if (handle.classList.contains('hfo-left-handle')) {
        newIndex = sliderIndex - 1
    } else if (handle.classList.contains('hfo-right-handle')) {
        newIndex = sliderIndex + 1
    }

    if (newIndex < 0) {
        newIndex = maxIndex
    } else if (newIndex > maxIndex) {
        newIndex = 0
    }

    slider.style.setProperty('--slider-index', newIndex)
}
