import { memo } from 'react';
import type { FC } from 'react';

import resets from '../_resets.module.css';
import { EntypoShareIcon } from './EntypoShareIcon.js';
import { IcRoundCallIcon } from './IcRoundCallIcon.js';
import { IonArrowBackOutlineIcon } from './IonArrowBackOutlineIcon.js';
import classes from './MyLanding.module.css';

interface Props {
  className?: string;
}
/* @figmaId 1:24 */
export const MyLanding: FC<Props> = memo(function MyLanding(props = {}) {
  return (
    <div className={`${resets.clapyResets} ${classes.root}`}>
      <div className={classes.rectangle50}></div>
      <div className={classes.entypoShare}>
        <EntypoShareIcon className={classes.icon} />
      </div>
      <div className={classes.rectangle44}></div>
      <div className={classes.icRoundCall}>
        <IcRoundCallIcon className={classes.icon2} />
      </div>
      <div className={classes.rectangle54}></div>
      <div className={classes.rectangle14}></div>
      <div className={classes.rectangle3}></div>
      <div className={classes.rectangle51}></div>
      <div className={classes.rectangle10}></div>
      <div className={classes.rectangle46}></div>
      <div className={classes.rectangle11}></div>
      <div className={classes.rectangle53}></div>
      <div className={classes.rectangle48}></div>
      <div className={classes.rectangle8}></div>
      <div className={classes.rectangle5}></div>
      <div className={classes.rectangle12}></div>
      <div className={classes.rectangle45}></div>
      <div className={classes.rectangle20}></div>
      <div className={classes.home}>Home</div>
      <div className={classes.rectangle26}></div>
      <div className={classes.aboutMe}>About me</div>
      <div className={classes.rectangle32}></div>
      <div className={classes.gallery}>Gallery</div>
      <div className={classes.rectangle38}></div>
      <div className={classes.eNG}>ENG</div>
      <div className={classes.rectangle7}></div>
      <div className={classes.ionArrowBackOutline}>
        <IonArrowBackOutlineIcon className={classes.icon3} />
      </div>
      <div className={classes.rectangle56}></div>
      <div className={classes.contact}>Contact</div>
      <div className={classes.rectangle57}></div>
      <div className={classes.aboutMe2}>About me</div>
      <div className={classes.rectangle58}></div>
      <div className={classes.thankYouForVisit}>Thank You For Visit</div>
      <div className={classes.hiThereWelcomeToMyWebsite}>
        <div className={classes.textBlock}>Hi there .</div>
        <div className={classes.textBlock2}>Welcome to my website</div>
      </div>
    </div>
  );
});
