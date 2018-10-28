/**
 * nlform.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com

 * Modified by Get Bowtied (Romi)

 * http://tympanus.net/codrops/2013/05/21/natural-language-form-with-custom-input-elements/

 */
;( function( window ) {
	
	'use strict';

	var document = window.document;

	function NLForm( el, autosubmit ) {	
		this.el = el;
		this.autosubmit = autosubmit;
		//this.overlay = this.el.querySelector( '.nl-overlay' );
		this.fields = [];
		this.fldOpen = -1;
		this._init();
	}

	NLForm.prototype = {
		_init : function() {
			var self = this;
			Array.prototype.slice.call( this.el.querySelectorAll( 'select' ) ).forEach( function( el, i ) {
				self.fldOpen++;
				self.fields.push( new NLField( self, el, self.fldOpen, self.autosubmit ) );
			} );
			//this.overlay.addEventListener( 'click', function(ev) { self._closeFlds(); } );
			//this.overlay.addEventListener( 'touchstart', function(ev) { self._closeFlds(); } );
		},
		_closeFlds : function() {
			if( this.fldOpen !== -1 ) {
				this.fields[ this.fldOpen ].close();
			}
		}
	}

	function NLField( form, el, idx, autosubmit ) {
		this.form = form;
		this.elOriginal = el;
		this.pos = idx;
		this.autosubmit = autosubmit;
		this._create();
		this._initEvents();
	}

	NLField.prototype = {
		
		_create : function() {
			this._createDropDown();
		},
		
		_createDropDown : function() {
			var self = this;
			this.overlay = document.createElement( 'div' );
			this.overlay.className = 'nl-overlay';
			this.fld = document.createElement( 'div' );
			this.fld.className = 'nl-field nl-dd';
			this.toggle = document.createElement( 'a' );
			this.toggle.innerHTML = this.elOriginal.options[ this.elOriginal.selectedIndex ].innerHTML;
			this.toggle.className = 'nl-field-toggle';
			this.optionsList = document.createElement( 'ul' );
			var ihtml = '';
			Array.prototype.slice.call( this.elOriginal.querySelectorAll( 'option' ) ).forEach( function( el, i ) {
				ihtml += self.elOriginal.selectedIndex === i ? '<li class="nl-dd-checked">' + el.innerHTML + '</li>' : '<li>' + el.innerHTML + '</li>';
				// selected index value
				if( self.elOriginal.selectedIndex === i ) {
					self.selectedIdx = i;
				}
			} );
			this.optionsList.innerHTML = ihtml;
			this.fld.appendChild( this.toggle );
			this.fld.appendChild( this.optionsList );
			this.elOriginal.parentNode.insertBefore( this.fld, this.elOriginal );
			this.elOriginal.parentNode.insertBefore( this.overlay, this.elOriginal );
			this.elOriginal.style.display = 'none';
		},
		
		_initEvents : function() {
			
			var self = this;
			
			this.toggle.addEventListener( 'click', function( ev ) { ev.preventDefault(); ev.stopPropagation(); self._open(); } );
			this.toggle.addEventListener( 'touchstart', function( ev ) { ev.preventDefault(); ev.stopPropagation(); self._open(); } );

			this.overlay.addEventListener( 'click', function( ev ) { ev.preventDefault(); self.close(); } );
			this.overlay.addEventListener( 'touchstart', function( ev ) { ev.preventDefault(); self.close(); } );

			var opts = Array.prototype.slice.call( this.optionsList.querySelectorAll( 'li' ) );
			
			opts.forEach( function( el, i ) {
				el.addEventListener( 'click', function( ev ) { ev.preventDefault(); self.close( el, opts.indexOf( el ) ); } );
				el.addEventListener( 'touchstart', function( ev ) { ev.preventDefault(); self.close( el, opts.indexOf( el ) ); } );
			} );

		},
		
		_open : function() {
			if( this.open ) {
				return false;
			}
			this.open = true;
			this.form.fldOpen = this.pos;
			var self = this;
			this.fld.className += ' nl-field-open';
		},
		
		close : function( opt, idx ) {
			if( !this.open ) {
				return false;
			}
			this.open = false;
			this.form.fldOpen = -1;
			this.fld.className = this.fld.className.replace(/\b nl-field-open\b/,'');

			if( opt ) {
				// remove class nl-dd-checked from previous option
				var selectedopt = this.optionsList.children[ this.selectedIdx ];
				selectedopt.className = '';
				opt.className = 'nl-dd-checked';
				this.toggle.innerHTML = opt.innerHTML;
				// update selected index value
				this.selectedIdx = idx;
				// update original select element´s value
				this.elOriginal.value = this.elOriginal.children[ this.selectedIdx ].value;
				// submit form
				if (this.autosubmit == "true") this.elOriginal.closest("form").submit();
			}

		}

	}

	// add to global namespace
	window.NLForm = NLForm;

} )( window );