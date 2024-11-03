require('./style.css');

import lottie from 'lottie-web';
import { defineElement } from '@lordicon/element';

// define "lord-icon" custom element with default properties
defineElement(lottie.loadAnimation);

// script da aba lateral
const button = document.getElementById('btn-active');
const closeButton = document.querySelector('.close-button');
const navigationMenu = document.querySelector('.navigation__menu');
const notification = document.getElementById('notification');
const toats = document.getElementById('toats');


button.addEventListener('click', () => {
  navigationMenu.classList.remove('none');
  navigationMenu.classList.remove('hide');
});

toats.addEventListener('click', () => {
  notification.classList.remove('none');
});

closeButton.addEventListener('click', () => {
  navigationMenu.classList.add('hide');
});


// script da aba lateral
const button = document.getElementById('btn-active');
const closeButton = document.querySelector('.close-button');
const navigationMenu = document.querySelector('.navigation__menu');
const notification = document.getElementById('notification');
const toats = document.getElementById('toats');


button.addEventListener('click', () => {
  navigationMenu.classList.remove('none');
  navigationMenu.classList.remove('hide');
});

toats.addEventListener('click', () => {
  notification.classList.remove('none');
});

closeButton.addEventListener('click', () => {
  navigationMenu.classList.add('hide');
});