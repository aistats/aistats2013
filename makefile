all: accom.html awards.html cfp.html committee.html dates.html index.html local.html past.html policy.html proceedings.html registration.html regbycheck.html review-inst.html reviewing.html schedule.html speakers.html sponsors.html submit.html keywords.html verify.html

clean:
	rm *.html

reg:
	sqlite3 registration/register.db "select * from reg"

STATIFY=perl -npe 's/\.php/\.html/g'

accom.html: accom.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

awards.html: awards.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

cfp.html: cfp.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

committee.html: committee.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

dates.html: dates.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

index.html: index.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

keywords.html: keywords.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

local.html: local.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

past.html: past.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

policy.html: policy.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

proceedings.html: proceedings.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

registration.html: registration.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

regtest.html: regtest.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

regbycheck.html: regbycheck.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

review-inst.html: review-inst.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

reviewing.html: reviewing.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

schedule.html: schedule.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

speakers.html: speakers.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

sponsors.html: sponsors.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

submit.html: submit.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

verify.html: verify.php includes/aistatshead.php includes/aistatstail.php
	php $< | $(STATIFY) > $@

