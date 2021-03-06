/**
 *------------------------------------------------------------------------------
 *
 *  Application/Internal Event Emitter
 *
 *  Used For Internal Communication/Events That Are Not Accessible By DOM
 *  Directives/Delegated Events
 *
 */

bind('emitter', {
    dependencies: ['pubsub'],
    value: function(self) {
        return self;
    }
});
